<?php
/**
* @package phpBB Extension - Font Awesome
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace sniper\fontawesome\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\extension\manager */
	protected $extension_manager;
	
	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/**
	* Constructor
	*
	* @param \phpbb\auth\auth                     $auth
	* @param \phpbb\template\template             $template
	* @param \phpbb\extension\manager             $extension_manager
	* @param \phpbb\user                          $user
	* @param \phpbb\db\driver\driver_interface    $db
	* @param \phpbb\request\request               $request
	* @param \phpbb\config\config                 $config
	* @param \phpbb\controller\helper             $controller_helper
	*
	*/
	public function __construct(
		\phpbb\auth\auth $auth,
		\phpbb\template\template $template,
		\phpbb\extension\manager $extension_manager,
		\phpbb\user $user,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\request\request $request,
		\phpbb\config\config $config,
		\phpbb\controller\helper $controller_helper
	)
	{
		$this->auth                 = $auth;
		$this->template             = $template;
		$this->extension_manager    = $extension_manager;
		$this->user                 = $user;
		$this->db                   = $db;
		$this->request              = $request;
		$this->config               = $config;
		$this->controller_helper    = $controller_helper;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'         => 'load_language_on_setup',
			'core.adm_page_header'    => 'adm_page_header',
			'core.page_header'        => 'page_header',
			'core.permissions'        => 'permissions',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'sniper/fontawesome',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function adm_page_header($event)
	{
		$this->user->add_lang_ext('sniper/fontawesome', 'common');
		$this->assign_authors();

		$this->template->assign_vars(array(
			'U_FONTAWESOME'         => $this->controller_helper->route('sniper_fontawesome_controller'),
			'FONTAWESOME_WIDTH'     => $this->config['fontawesome_width'],
			'FONTAWESOME_HEIGHT'    => $this->config['fontawesome_height'],
			'FONTAWESOME_TEXT'      => $this->config['fontawesome_text'],
		));
	}

	public function page_header($event)
	{
		$this->assign_authors();

		$this->template->assign_vars(array(
			'U_FONTAWESOME'                => $this->controller_helper->route('sniper_fontawesome_controller'),
			'FONTAWESOME_VALUE'            => $this->config['fontawesome_value'],
			'FONTAWESOME_TEXT'             => $this->config['fontawesome_text'],
			'FONTAWESOME_STYLE'            => $this->config['fontawesome_style'],
			'FONTAWESOME_WIDTH'            => $this->config['fontawesome_width'],
			'FONTAWESOME_HEIGHT'           => $this->config['fontawesome_height'],
			'U_USE_FONT_AWESOME_BBCODE'    => $this->auth->acl_get('u_use_font_awesome_bbcode') ? true : false,
		));
	}

	protected function assign_authors()
	{
		$md_manager = $this->extension_manager->create_extension_metadata_manager('sniper/fontawesome', $this->template);
		$meta = $md_manager->get_metadata();
		$author_homepages = [];
		$hosts = [];

		foreach (array_slice($meta['authors'], 0, 3) as $author)
		{
			$hosts[] = $author['homepage'];
			$author_homepages[] = sprintf('<a href="%1$s" title="%2$s &middot; %1$s" target="_blank">%3$s</a>', $author['homepage'], $author['sitename'], $author['name']);
		}

		$this->template->assign_vars(array(
			'FONTAWESOME_DISPLAY_NAME'     => $meta['extra']['display-name'],
			'FONTAWESOME_VERSION'          => $meta['version'],
			'FONTAWESOME_AUTHOR_HOMEPAGES' => implode(' &amp; ', $author_homepages),
		));
	}

	public function permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions['u_use_font_awesome_bbcode'] = array('lang' => 'ACL_U_USE_FONT_AWESOME_BBCODE', 'cat' => 'post');
		$event['permissions'] = $permissions;
	}
}
