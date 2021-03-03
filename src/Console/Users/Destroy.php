<?php

namespace App\Console\Users;

use App\Models\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Destroy extends Command
{
    /**
     * @var UserRepository
     */
    private UserRepository $UserRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        parent::__construct();

        $this->UserRepository = $userRepository;
    }

    protected function configure()
    {
        $this
            ->setDescription('Deletes a new user.')

            ->setHelp('This command allows you to delete a user...')

            ->setName("user:destroy")

            ->addArgument('id', InputArgument::REQUIRED, 'ID of the user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->UserRepository->delete($input->getArgument('id'));

        $output->write("The user with the ID of '{$input->getArgument('id')}' has been deleted." . PHP_EOL);
        return Command::SUCCESS;
    }
}
