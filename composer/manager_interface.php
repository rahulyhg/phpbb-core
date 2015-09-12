<?php
/**
 * Created by IntelliJ IDEA.
 * User: tristan.darricau
 * Date: 09/09/15
 * Time: 23:12
 */
namespace phpbb\composer;
use Composer\IO\IOInterface;
use phpbb\composer\exception\runtime_exception;


/**
 * Class to manage packages through composer.
 */
interface manager_interface
{
	/**
	 * Installs (if necessary) a set of packages
	 *
	 * @param array $packages Packages to install.
	 *                        Each entry may be a name or an array associating a version constraint to a name
	 * @param IOInterface $io IO object used for the output
	 *
	 * @throws runtime_exception
	 */
	public function install(array $packages, IOInterface $io = null);

	/**
	 * Updates or installs a set of packages
	 *
	 * @param array $packages Packages to update.
	 *                        Each entry may be a name or an array associating a version constraint to a name
	 * @param IOInterface $io IO object used for the output
	 *
	 * @throws runtime_exception
	 */
	public function update(array $packages, IOInterface $io = null);

	/**
	 * Removes a set of packages
	 *
	 * @param array $packages Packages to remove.
	 *                        Each entry may be a name or an array associating a version constraint to a name
	 * @param IOInterface $io IO object used for the output
	 *
	 * @throws runtime_exception
	 */
	public function remove(array $packages, IOInterface $io = null);

	/**
	 * Tells whether or not a package is managed by Composer.
	 *
	 * @param string $packages Package name
	 *
	 * @return bool
	 */
	public function is_managed($packages);

	/**
	 * Returns the list of managed packages for the current type
	 *
	 * @return array The managed packages associated to their version.
	 */
	public function get_managed_packages();

	/**
	 * Returns the list of managed packages for all phpBB types
	 *
	 * @return array The managed packages associated to their version.
	 */
	public function get_all_managed_packages();

	/**
	 * Returns the list of available packages
	 *
	 * @return array The name of the available packages, associated to their definition. Ordered by name.
	 */
	public function get_available_packages();

	/**
	 * Start managing a manually installed package
	 *
	 * Remove a package installed manually and reinstall it using composer.
	 *
	 * @param string $package Package to manage
	 *
	 * @throws runtime_exception
	 */
	public function start_managing($package);
}
