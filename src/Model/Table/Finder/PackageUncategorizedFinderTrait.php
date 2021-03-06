<?php
namespace App\Model\Table\Finder;

use Cake\ORM\Query;

trait PackageUncategorizedFinderTrait
{
    /**
     * Returns an uncategorized Package
     *
     * @param \Cake\ORM\Query $query The query to find with
     * @param array $options The options to use for the find
     * @return \Cake\ORM\Query The query builder
     */
    public function findUncategorized(Query $query, array $options)
    {
        $query->where([
            "{$this->getAlias()}.deleted" => false,
            "{$this->getAlias()}.category_id IS" => null,
        ]);

        return $query;
    }
}
