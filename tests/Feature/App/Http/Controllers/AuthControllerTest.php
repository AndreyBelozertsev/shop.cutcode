<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;

use Domain\Auth\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\AuthController;
use App\Notifications\NewUserNotification;
use App\Listeners\SendEmailNewUserListener;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Auth\SignInFormRequest;
use App\Http\Requests\Auth\SignUpFormRequest;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\ForgotPasswordController;

class AuthControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
    * @test
    * @return void
    */
    public function is_login_page_success():void
    {
        $this->get(action([SignInController::class, 'page']))
            ->assertOk()
            ->assertSee('Вход в аккаунт')
            ->assertViewIs ('auth.login'); 
    }

    /**
    * @test
    * @return void
    */
    public function is_sign_up_page_success():void
    {
        $this->get(action([SignUpController::class, 'page']))
            ->assertOk()
            ->assertSee('Регистрация')
            ->assertViewIs ('auth.sign-up'); 
    }

        /**
     * @test
     * @return void
     */
    public function is_sign_up_success():void
    {
        Event::fake();
        Notification::fake();

        $request = SignUpFormRequest::factory()->create([
            'password' => '1234567Aa',
            'password_confirmation' => '1234567Aa'
        ]);
        
        $this->assertDatabaseMissing('users',[
            'email' =>$request['email']
        ]);
        
        $response = $this->post(action([SignUpController::class, 'handle']), $request);
      
        //$response->assertValid();

        $user = User::query()
            ->where('email', $request['email'])
            ->first(); 
        
        $this->assertDatabaseHas('users',[
            'email' =>$request['email']
        ]);

        Event::assertDispatched(Registered::class);
        Event::assertListening(Registered::class, SendEmailNewUserListener::class);

        $event = new Registered($user);
        $listener = new SendEmailNewUserListener();
        $listener->handle($event);
        Notification::assertSentTo($user, NewUserNotification::class);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect( route('home') );
    }

    /**
    * @test
    * @return void
    */
    public function is_forgot_page_success():void
    {
        $this->get(action([ForgotPasswordController::class, 'page']))
            ->assertOk()
            ->assertSee('Забыли пароль?')
            ->assertViewIs ('auth.forgot-password'); 
    } 

    /**
    * @test
    * @return void
    */
    public function is_sign_in_success():void
    {
        $password = '12345678';
        $user = UserFactory::new()->create([
            'email' => 'info.rakurs@bk.ru',
            'password' => bcrypt($password)
        ]);
        $request = SignInFormRequest::factory()->create([
            'email' => $user->email,
            'password' => $password
        ]);
        
        $response = $this->post(action([SignInController::class, 'handle']), $request);

        $response->assertValid()
                 ->assertRedirect(route('home'));   
  
        $this->assertAuthenticatedAs($user);

    } 


    /**
    * @test
    * @return void
    */
    public function is_logout_success():void
    {
        
        $user = UserFactory::new()->create([
            'email' => 'info.rakurs@bk.ru'
        ]);
         
        $this->actingAs($user)
             ->delete(action([SignInController::class, 'logOut']));

        $this->assertGuest();
    }

}