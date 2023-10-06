<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\SearchEndpoint;

use ONGR\ElasticsearchDSL\Knn\Knn;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Search suggest dsl endpoint.
 */
class KnnEndpoint extends AbstractSearchEndpoint
{
    /**
     * Endpoint name
     */
    const NAME = 'knn';

    /**
     * {@inheritdoc}
     */
    public function normalize(
        NormalizerInterface $normalizer,
        $format = null,
        array $context = []
    ): array|string|int|float|bool {
        $output = [];
        if (count($this->getAll()) > 0) {
            /** @var Knn $knn */
            foreach ($this->getAll() as $knn) {
                if ($knn instanceof Knn) {
                    $output = $knn->toArray();
                }
            }
        }

        return $output;
    }
}
