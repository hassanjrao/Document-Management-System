<?php
/**
 * FindStringMatch
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * convertapi
 *
 * Convert API lets you effortlessly convert file formats and types.
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * FindStringMatch Class Doc Comment
 *
 * @category Class
 * @description Individual match result of finding a target string in a longer text string
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FindStringMatch implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'FindStringMatch';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'character_offset_start' => 'int',
        'character_offset_end' => 'int',
        'containing_line' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'character_offset_start' => 'int32',
        'character_offset_end' => 'int32',
        'containing_line' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'character_offset_start' => 'CharacterOffsetStart',
        'character_offset_end' => 'CharacterOffsetEnd',
        'containing_line' => 'ContainingLine'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'character_offset_start' => 'setCharacterOffsetStart',
        'character_offset_end' => 'setCharacterOffsetEnd',
        'containing_line' => 'setContainingLine'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'character_offset_start' => 'getCharacterOffsetStart',
        'character_offset_end' => 'getCharacterOffsetEnd',
        'containing_line' => 'getContainingLine'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['character_offset_start'] = isset($data['character_offset_start']) ? $data['character_offset_start'] : null;
        $this->container['character_offset_end'] = isset($data['character_offset_end']) ? $data['character_offset_end'] : null;
        $this->container['containing_line'] = isset($data['containing_line']) ? $data['containing_line'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets character_offset_start
     *
     * @return int
     */
    public function getCharacterOffsetStart()
    {
        return $this->container['character_offset_start'];
    }

    /**
     * Sets character_offset_start
     *
     * @param int $character_offset_start 0-based index of the start of the match
     *
     * @return $this
     */
    public function setCharacterOffsetStart($character_offset_start)
    {
        $this->container['character_offset_start'] = $character_offset_start;

        return $this;
    }

    /**
     * Gets character_offset_end
     *
     * @return int
     */
    public function getCharacterOffsetEnd()
    {
        return $this->container['character_offset_end'];
    }

    /**
     * Sets character_offset_end
     *
     * @param int $character_offset_end 0-based index of the end of the match
     *
     * @return $this
     */
    public function setCharacterOffsetEnd($character_offset_end)
    {
        $this->container['character_offset_end'] = $character_offset_end;

        return $this;
    }

    /**
     * Gets containing_line
     *
     * @return string
     */
    public function getContainingLine()
    {
        return $this->container['containing_line'];
    }

    /**
     * Sets containing_line
     *
     * @param string $containing_line Text content of the line containing the match
     *
     * @return $this
     */
    public function setContainingLine($containing_line)
    {
        $this->container['containing_line'] = $containing_line;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

