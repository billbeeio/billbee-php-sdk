<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2018 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Transformer;

class DefinitionConfigTransformer implements \MintWare\DMM\TransformerInterface
{
    /** @inheritdoc */
    public static function transform($data)
    {
        if (isset($data['Choices']) && !is_array($data['Choices'])) {
            $data['Choices'] = explode("\n", $data['Choices']);
        }
        return $data;
    }

    /** @inheritdoc */
    public static function reverseTransform($data)
    {
        if (isset($data['Choices']) && is_array($data['Choices'])) {
            $data['Choices'] = implode("\n", $data['Choices']);
        }
        return $data;
    }
}
