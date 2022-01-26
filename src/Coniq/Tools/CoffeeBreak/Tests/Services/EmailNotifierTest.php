<?php

use Coniq\Tools\CoffeeBreak\Entity\CoffeeBreakPreference;
use Coniq\Tools\CoffeeBreak\Entity\StaffMember;
use PHPUnit\Framework\TestCase;

class HipChatNotifierTest extends TestCase
{
    public function testStatusOfNotificationIsTrue()
    {
        $staff = new StaffMember();
        $staff->setEmail("testemail@gmail.com");
        $preference = new CoffeeBreakPreference("drink", "coffee", $staff);

        $notificationService = new \Coniq\Tools\CoffeeBreak\Services\EmailNotifier();
        $status = $notificationService->notifyStaffMember($staff, $preference);

        $this->assertTrue($status);
    }

    public function testThrowsExceptionWhenCannotNotify()
    {
        $staff = new StaffMember();
        $preference = new CoffeeBreakPreference("drink", "tea", $staff);
        $notificationService = new \Coniq\Tools\CoffeeBreak\Services\EmailNotifier();

        $this->expectException(\RuntimeException::class);
        $status = $notificationService->notifyStaffMember($staff, $preference);
    }
}
