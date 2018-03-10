<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadAvatarTest extends TestCase
{
    /** @test */
    public function it_can_upload_avatar_and_avatar_exist()
    {
    	Storage::fake('avatars');

        $response = $this->json('POST', '/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        // Assert the file was stored...
        Storage::disk('avatars')->assertExists('avatar.jpg');

        // Assert a file does not exist...
        Storage::disk('avatars')->assertMissing('missing.jpg');
    }
}
