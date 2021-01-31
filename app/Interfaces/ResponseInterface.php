<?php

namespace App\Interfaces;

interface ResponseInterface {
    /**
     * Calculate user mbti
     */
    public function calculateMbti($userResponse);

    /**
     * Fetch the response of a user by email
     */
    public function getUserResponse($email);

    /**
     * Record the response of a user
     */
    public function recordResponse($userResponse);
}