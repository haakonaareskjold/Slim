<?php


namespace App\Console\Users;

use App\Models\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Create extends Command
{

    private EntityManagerInterface $entityManager;

    public function __construct
    (
        EntityManagerInterface $entityManager,
    )
    {
        parent::__construct();

        $this->entityManager = $entityManager;
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
        $name = $input->getArgument('name');

        $user = new User();
        $user->setName($name);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $output->write("User with the name '$name' has been created!");
        return Command::SUCCESS;
    }
}