<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

#[AsCommand(
    name: 'app:affect-admin-role-to-the-user',
    description: 'Add a short description for your command',
)]
class AffectAdminRoleToTheUserCommand extends Command
{

    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;

        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
        ->addArgument('email', InputArgument::OPTIONAL, 'Email de utilisateur');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $input->getArgument('email');

        if (!$email) {
            $io->error('Utilisateur non trouvé associé a cet email');

            return Command::FAILURE;
        }

        $user = $this->userRepository->findOneBy(['email' => $email]);

        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        $this->entityManager->flush();
        return Command::SUCCESS;
    }
}
