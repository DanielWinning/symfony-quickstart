<?php

namespace App\Command\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:regenerate-app-secret',
    description: 'Regenerates your applications APP_SECRET environment variable',
)]
class RegenerateAppSecretCommand extends Command
{
    protected static $defaultName = 'app:regenerate-app-secret';
    private const CHARACTERS = '0123456789abcdef';

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $secret = '';

        for ($i = 0; $i < 32; $i++) {
            $secret .= self::CHARACTERS[rand(0, strlen(self::CHARACTERS) - 1)];
        }

        shell_exec('sed -i -E "s/^APP_SECRET=.{32}$/APP_SECRET=' . $secret . '/" .env');

        $io->success(sprintf('New APP_SECRET was generated: %s', $secret));

        return Command::SUCCESS;
    }
}
