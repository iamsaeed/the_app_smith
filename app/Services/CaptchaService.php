<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class CaptchaService
{
    /**
     * Generate a simple math captcha and store the answer in the session
     *
     * @return array
     */
    public function generateMathCaptcha(): array
    {
        // Generate two random numbers between 1 and 10
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        // Calculate the answer
        $answer = $num1 + $num2;

        // Store the answer in the session
        Session::put('captcha_answer', $answer);

        return [
            'question' => "$num1 + $num2 = ?",
            'answer' => $answer,
        ];
    }

    /**
     * Validate the captcha answer
     *
     * @param string|int $userAnswer
     * @return bool
     */
    public function validateCaptcha($userAnswer): bool
    {
        $correctAnswer = Session::get('captcha_answer');

        // If there's no answer in the session, validation fails
        if ($correctAnswer === null) {
            return false;
        }

        // Validate the user's answer
        $isValid = (int) $userAnswer === $correctAnswer;

        // Clear the session after validation to prevent reuse
        Session::forget('captcha_answer');

        return $isValid;
    }
}
