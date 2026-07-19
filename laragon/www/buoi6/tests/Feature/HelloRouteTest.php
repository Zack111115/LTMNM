<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloRouteTest extends TestCase
{
    public function test_hello_route_returns_correct_response(): void
    {
        // Thực hiện một request GET đến route /hello
        $response = $this->get('/hello');

        // Xác nhận phản hồi HTTP trả về mã trạng thái 200 OK
        $response->assertStatus(200);

        // Xác nhận nội dung của phản hồi có chứa chuỗi yêu cầu
        $response->assertSee('Laravel 12');
    }
}