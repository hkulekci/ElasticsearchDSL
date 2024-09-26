<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Tests\Unit\Query\Vector;

use ONGR\ElasticsearchDSL\Query\Vector\SparseVector;

class SparseVectorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Tests toArray().
     */
    public function testToArray(): void
    {
        $query = new SparseVector('field');
        $this->assertEquals([
            'sparse_vector' => [
                'field' => 'field'
            ]
        ], $query->toArray());
    }

    /**
     * Tests toArray().
     */
    public function testToArrayWithVector(): void
    {
        $query = new SparseVector('field');
        $query->setQueryVector([1, 2, 3]);
        $this->assertEquals([
            'sparse_vector' => [
                'field' => 'field',
                'query_vector' => [1, 2, 3]
            ]
        ], $query->toArray());
    }

    /**
     * Tests toArray().
     */
    public function testToArrayWithPrune(): void
    {
        $query = new SparseVector('field');
        $query->setQueryVector([1, 2, 3]);
        $query->setPrune(true);
        $this->assertEquals([
            'sparse_vector' => [
                'field' => 'field',
                'query_vector' => [1, 2, 3],
                'prune' => true,
            ]
        ], $query->toArray());
    }

    /**
     * Tests toArray().
     */
    public function testToArrayWithInferenceId(): void
    {
        $query = new SparseVector('field');
        $query->setInferenceId('id');
        $query->setQuery('query');
        $query->setPrune(true);
        $this->assertEquals([
            'sparse_vector' => [
                'field' => 'field',
                'inference_id' => 'id',
                'query' => 'query',
                'prune' => true,
            ]
        ], $query->toArray());
    }
}
