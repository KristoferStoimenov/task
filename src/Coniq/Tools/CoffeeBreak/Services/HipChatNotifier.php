<?php
namespace Coniq\Tools\CoffeeBreak\Services;

use Coniq\Tools\CoffeeBreak\Entity\StaffMember;
use Coniq\Tools\CoffeeBreak\Entity\CoffeeBreakPreference;
use PHPUnit\Framework\MockObject\RuntimeException;

class HipChatNotifier
{
    /**
     * @param StaffMember $staffMember
     * @param CoffeeBreakPreference $preference
     * @return bool
     */
    public function notifyStaffMember(StaffMember $staffMember, CoffeeBreakPreference $preference)
    {
        /**
         * Imagine that this function:
         * Sends a notification to the user on Hipchat that their coffee break refreshment today will be $preference
         * returns true of false status of notification sent
         */

        if (empty($staffMember->getHipChatIdentifier())) {
            throw new RuntimeException("Cannot send notification - no HipChatIdentifier");
        }

        return true;
    }
}