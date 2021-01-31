<?php

namespace App\Interfaces;

interface ResponseInterface {
    /**
     * Calculate user mbti
     */
    public function calculateMbti($userResponse);
}