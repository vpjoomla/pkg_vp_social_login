<?php

/**
 * @package     VP Social Login
 * @subpackage  pkg_vpsociallogin
 * @author      Volodymyr Pershyn
 * @copyright   Copyright (C) 2024 - 2026 VPJoomla. All rights reserved.
 * @license     GNU GPL v2 or later; see LICENSE.txt
 * @link        https://vpjoomla.com
 */

\defined('_JEXEC') || die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Installer\InstallerScriptInterface;
use Joomla\CMS\Language\Text;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class () implements ServiceProviderInterface {
    public function register(Container $container): void
    {
        $container->set(
            InstallerScriptInterface::class,
            new class () implements InstallerScriptInterface {
                public function install(InstallerAdapter $adapter): bool
                {
                    return true;
                }

                public function update(InstallerAdapter $adapter): bool
                {
                    return true;
                }

                public function uninstall(InstallerAdapter $adapter): bool
                {
                    return true;
                }

                public function preflight(string $type, InstallerAdapter $adapter): bool
                {
                    return true;
                }

                public function postflight(string $type, InstallerAdapter $adapter): bool
                {
                    if (\in_array($type, ['install', 'update'], true)) {
                        try {
                            Factory::getApplication()->enqueueMessage(
                                Text::_('PKG_VP_SOCIAL_LOGIN_POSTINSTALL'),
                                'message'
                            );
                        } catch (\Throwable $e) {
                            // Non-fatal: the package is installed regardless.
                        }
                    }

                    return true;
                }
            }
        );
    }
};
