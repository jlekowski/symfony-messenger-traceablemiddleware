<?php

namespace App\MessageHandler;

use App\Message\Notification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class NotificationHandler implements MessageHandlerInterface
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param Notification $notification
     * @throws \Exception
     */
    public function __invoke(Notification $notification)
    {
        $this->kernel->handle(new Request(), HttpKernelInterface::SUB_REQUEST);
    }
}
