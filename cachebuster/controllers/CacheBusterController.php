<?php
/**
 * CacheBuster plugin for Craft CMS
 *
 * CacheBuster Controller
 *
 * --snip--
 * Generally speaking, controllers are the middlemen between the front end of the CP/website and your plugin’s
 * services. They contain action methods which handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering post data, saving it on a model,
 * passing the model off to a service, and then responding to the request appropriately depending on the service
 * method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what the method does (for example,
 * actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 * --snip--
 *
 * @author    Alexander Bech
 * @copyright Copyright (c) 2016 Alexander Bech
 * @link      http://vaersaagod.no
 * @package   CacheBuster
 * @since     1.0.0
 */

namespace Craft;

class CacheBusterController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array('actionClear');


    /**
     * Handle the action to clear the cache.
     */
    public function actionClear()
    {

      craft()->templateCache->deleteAllCaches();
      craft()->userSession->setNotice( Craft::t('Template cache has been cleared') );
      $this->renderTemplate('cachebuster/_index');
    }

}