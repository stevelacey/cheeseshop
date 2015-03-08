<?php

namespace WordPressBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigurationInstallCommand extends Command
{
    protected $count = 0;

    protected function configure()
    {
        $this
            ->setName('wordpress:configuration:install')
            ->setDescription('Installs the WordPress configuration in app/config into wordpress/wordpress.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $symlink = __DIR__ . '/../../../vendor/wordpress/wordpress/wp-config.php';
        $config = '../../../app/config/wordpress.php';

        $output->writeln(sprintf('<info>%s</info>', 'Scanning WordPress for configuration...'));

        if (!is_link($symlink)) {
            if (symlink($config, $symlink)) {
                $output->writeln('<info>WordPress configuration symlinked into wordpress/wordpress ✔</info>');
            } else {
                $output->writeln('<error>An error occured while installing the WordPress configuration</error>');
            }
        } else {
            $output->writeln('<comment>WordPress configuration already installed</comment>');
        }
    }
}
