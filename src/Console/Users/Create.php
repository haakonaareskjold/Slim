<?php

namespace App\Console\Users;

use App\Models\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Create extends Command
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
            ->setDescription('Creates a new user.')

            ->setHelp('This command allows you to create a user...')

            ->setName("user:create")

            ->addArgument('name', InputArgument::REQUIRED, 'Name of the user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->UserRepository->createUser($input->getArgument('name'));

        $output->write("A new user with the name of '{$input->getArgument('name')}' has been created.");
        return Command::SUCCESS;
    }
}
