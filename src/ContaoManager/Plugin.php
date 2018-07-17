<?php
    
    namespace reluem\ContaoMembersBundle\ContaoManager;
    
    use Contao\CalendarBundle\ContaoCalendarBundle;
    use reluem\ContaoMembersBundle\ContaoMembersBundle;
    use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
    use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
    use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
    use Contao\CoreBundle\ContaoCoreBundle;
    
    /**
     * @see https://github.com/contao/manager-plugin/blob/master/src/Bundle/BundlePluginInterface.php Code in GitHub
     */
    class Plugin implements BundlePluginInterface
    {
        public function getBundles(ParserInterface $parser)
        {
            return [
                BundleConfig::create(ContaoMembersBundle::class)
                    ->setLoadAfter([
                        ContaoCoreBundle::class,
                        ContaoCalendarBundle::class,
                    ]),
            ];
        }
    }
