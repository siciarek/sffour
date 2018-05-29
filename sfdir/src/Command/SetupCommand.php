<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Lock\Factory;
use Symfony\Component\Lock\Store\SemaphoreStore;


class SetupCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:setup')
            ->setDescription('Application setup command.')
//            ->addOption(
//                'reset',
//                'r',
//                InputOption::VALUE_NONE,
//                'Reset database to initial values.'
//            )
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $store = new SemaphoreStore();
        $factory = new Factory($store);
        $io = new SymfonyStyle($input, $output);

        $lock = $factory->createLock(__CLASS__);

        if ($lock->acquire()) {

            /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-*/

            $io->title('The application is being configured.');

            $count = 100;

            $io->progressStart($count);
            array_map(function($i) use ($io) {
                $io->progressAdvance();
                usleep(20000);
            }, range(1, $count));
            $io->progressFinish();

            $io->success('The application configuration process succeeded.');

            /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-*/

            $lock->release();
        }

        return true;
    }
}
