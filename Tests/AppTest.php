<?php

use App\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{

    public function testOk()
    {
        $input = App::TEXT;
        $output = 'Тевирп! Онвад ен ьсиледив.';
    
        $app = new App();

        $class = new \ReflectionClass(App::class);
        $method = $class->getMethod('revertCharacters');
        $method->setAccessible(true);
        $result = $method->invokeArgs($app, [$input]);
        
        $this->assertSame($output, $result);
    }

    public function testBad()
    {
        $input = App::TEXT;
        $output = 'Тевsdfsdирп! Онвад fdsен ьсилsедив.';
    
        $app = new App();

        $class = new \ReflectionClass(App::class);
        $method = $class->getMethod('revertCharacters');
        $method->setAccessible(true);
        $result = $method->invokeArgs($app, [$input]);
        
        $this->assertNotSame($output, $result);
    }
}