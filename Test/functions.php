<?php
require '../functions.php';
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testSuccessextractDataForOutput()
    {
        $expected = '<div class="rows"><p class="brand">golf</p><p class="model">Model : jetta</p><p class="year">Year : 3213</p></div><div class="rows"><p class="brand">passat</p><p class="model">Model : kadett</p><p class="year">Year : 3893</p></div>';
        $input =[['Brand'=>'golf','Model'=>'jetta','Year'=>'3213'],['Brand'=>'passat','Model'=>'kadett','Year'=>'3893']];
        $case = extractDataForOutput($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureextractDataForOutput()
    {
        $expected ='Error';
        $input =[['Brand', 23, 32],['Brand', 23, 32]];
        $case = extractDataForOutput($input);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedextractDataForOutput()
    {
        $input = 37675;
        $this->expectException(TypeError::class);
        extractDataForOutput($input);
    }
}