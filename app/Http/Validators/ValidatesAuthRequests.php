<?php

namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait ValidatesAuthRequests
{
    /**
     * Validate login request input
     *
     * @param  Request $request
     *
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|max:255|email',
            'password' => 'required',
        ]);
    }

    /**
     * Validate refresh_token input
     *
     * @param  Request $request
     *
     * @throws ValidationException
     */
    protected function validateRefreshToken(Request $request)
    {
        $this->validate($request, [
            'refresh_token'    => 'required|size:32|alpha_num'
        ]);
    }

    /**
     * Validate register request input
     *
     * @param  Request $request
     *
     * @throws ValidationException
     */
    protected function validateRegister(Request $request)
    {
        $this->validate($request, [
            'captcha_response' => 'required',
            'name' => 'required|max:50|alpha_num',
            'email'    => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
    }

    /**
     * Validate password reset request input
     *
     * @param  Request $request
     *
     * @throws ValidationException
     */
    protected function validateRequestPasswordReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        // TODO: add response "Password reset completed" or somethin as not to show if a user exists.
    }

    /**
     * Validate password reset request input
     *
     * @param  Request $request
     *
     * @throws ValidationException
     */
    protected function validatePasswordReset(Request $request)
    {
        $this->validate($request, [
            'reset_password_token' => 'required|exists:users,reset_password_token',
            'password' => 'required'
        ]);
    }

    /**
     * Validate verify email request input
     *
     * @param  Request $request
     *
     * @throws ValidationException
     */
    protected function validateVerifyEmailToken(Request $request)
    {
        $this->validate($request, [
            'verify_email_token' => 'required|exists:users,verify_email_token'
        ]);
    }

}