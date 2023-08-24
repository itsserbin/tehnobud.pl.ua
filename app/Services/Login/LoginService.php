<?php


namespace App\Services\Login;


use App\Exceptions\LoginFailException;
use App\Models\User;
use App\Services\Dto\Login\LoginDto;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;

final class LoginService
{

    #[ArrayShape([
        'user'  => User::class,
        'token' => "string",
    ])]
    public function login(
        LoginDto $dto
    ): array {
        $user = User::where('login', $dto->getName())->first();

        if ( ! $user || ! Hash::check($dto->getPassword(), $user->password)) {
            throw new LoginFailException("Login or password invalid");
        }

        return [
            'user'  => $user,
            'token' => $user->createToken('admin')->plainTextToken,
        ];
    }

    #[ArrayShape(['data' => "bool"])]
    public function logout(
        User $user
    ): array {
        $user->tokens()->delete();

        return [
            'data' => true,
        ];
    }

}