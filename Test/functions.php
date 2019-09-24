<?php
require '../functions.php';
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testSuccessextractDataForOutput()
    {
        $expected = '<div class="rows"><p class="brand">golf</p><p class="model">vw : jetta</p><p class="year">volk : 3213</p></div><div class="rows"><p class="brand">passat</p><p class="model">opel : kadett</p><p class="year">volk : 3893</p></div>';
        $input =[['wv'=>'golf','vw'=>'jetta','volk'=>'3213'],['wv'=>'passat','opel'=>'kadett','volk'=>'3893']];
        $case = extractDataForOutput($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureextractDataForOutput()
    {
        $expected ='<div class="rows"><p class="brand">321</p><p class="model">22 : jetta</p><p class="year">volk : 3213</p></div><div class="rows"><p class="brand">passat</p><p class="model">55 : kadett</p><p class="year">volk : 3893</p></div>';
        $input =[['321'=>'321','22'=>'jetta','volk'=>'3213'],['wv'=>'passat','55'=>'kadett','volk'=>'3893']];
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