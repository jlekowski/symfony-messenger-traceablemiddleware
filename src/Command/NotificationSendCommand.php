<?php

namespace App\Command;

use App\Message\Notification;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class NotificationSendCommand extends Command
{
    /**
     * @var MessageBusInterface
     */
    private $bus;

    /**
     * @param MessageBusInterface $bus
     */
    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
        parent::__construct('notification:send');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->bus->dispatch(new Notification());
        return 0;
    }
}
