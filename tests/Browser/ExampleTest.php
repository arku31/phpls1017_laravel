<?php

namespace Tests\Browser;

use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $password = $faker->password(10);
            $browser->visit('/')
                    ->assertSee('Laravel')
                    ->clickLink('Register')
                    ->waitForLocation('/register', 5)
                    ->type('name', $faker->name)
                    ->type('email', $faker->email)
                    ->type('password', $password)
                    ->type('password_confirmation', $password)
                    ->press('Register')
                    ->assertPathIs('/home')
            ;
        });
    }

    //Listener - слушает и ждет событие. Дожидаясь - выполняет некий код
    //event - это событие. Событие может быть вызвать из любой точки.
}
