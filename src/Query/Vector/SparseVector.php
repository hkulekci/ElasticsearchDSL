<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Query\Vector;

use ONGR\ElasticsearchDSL\BuilderInterface;
use ONGR\ElasticsearchDSL\FieldAwareTrait;

class SparseVector implements BuilderInterface
{
    use FieldAwareTrait;

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $inferenceId;

    /**
     * @var string
     */
    private $query;

    /**
     * @var array
     */
    private $queryVector;

    /**
     * @var bool
     */
    private $prune;

    /**
     * TermSuggest constructor.
     * @param string $field
     */
    public function __construct(
        string $field,
    ) {
        $this->setField($field);
    }

    public function getQueryVector(): ?array
    {
        return $this->queryVector;
    }

    public function setQueryVector(array $queryVector): void
    {
        $this->queryVector = $queryVector;
    }

    public function getInferenceId(): ?string
    {
        return $this->inferenceId;
    }

    public function setInferenceId(string $inferenceId): void
    {
        $this->inferenceId = $inferenceId;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    public function isPrune(): ?bool
    {
        return $this->prune;
    }

    public function setPrune(bool $prune): void
    {
        $this->prune = $prune;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'sparse_vector';
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $output = [
            'field' => $this->getField(),
        ];

        if ($this->getInferenceId()) {
            $output['inference_id'] = $this->getInferenceId();
        }

        if ($this->getQuery()) {
            $output['query'] = $this->getQuery();
        }

        if ($this->isPrune()) {
            $output['prune'] = $this->isPrune();
        }

        if ($this->getQueryVector()) {
            $output['query_vector'] = $this->getQueryVector();
        }

        return [
            $this->getType() => $output
        ];
    }
}
