<?php
/**
 * Get list Items
 *
 * @package modxminify
 * @subpackage processors
 */
class modxMinifyGroupGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'modxMinifyGroup';
    public $languageTopics = array('modxminify:default');
    public $defaultSortField = 'position';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'modxminify.item';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                    'name:LIKE' => '%'.$query.'%',
                    'OR:description:LIKE' => '%'.$query.'%',
                ));
        }
        return $c;
    }
}
return 'modxMinifyGroupGetListProcessor';