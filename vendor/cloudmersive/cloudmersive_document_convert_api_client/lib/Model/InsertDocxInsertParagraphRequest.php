<?php
/**
 * InsertDocxInsertParagraphRequest
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
 * InsertDocxInsertParagraphRequest Class Doc Comment
 *
 * @category Class
 * @description Input to a Insert Paragraph request
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InsertDocxInsertParagraphRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InsertDocxInsertParagraphRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'input_file_bytes' => 'string',
        'input_file_url' => 'string',
        'paragraph_to_insert' => '\Swagger\Client\Model\DocxParagraph',
        'insert_placement' => 'string',
        'insert_path' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'input_file_bytes' => 'byte',
        'input_file_url' => null,
        'paragraph_to_insert' => null,
        'insert_placement' => null,
        'insert_path' => null
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
        'input_file_bytes' => 'InputFileBytes',
        'input_file_url' => 'InputFileUrl',
        'paragraph_to_insert' => 'ParagraphToInsert',
        'insert_placement' => 'InsertPlacement',
        'insert_path' => 'InsertPath'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'input_file_bytes' => 'setInputFileBytes',
        'input_file_url' => 'setInputFileUrl',
        'paragraph_to_insert' => 'setParagraphToInsert',
        'insert_placement' => 'setInsertPlacement',
        'insert_path' => 'setInsertPath'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'input_file_bytes' => 'getInputFileBytes',
        'input_file_url' => 'getInputFileUrl',
        'paragraph_to_insert' => 'getParagraphToInsert',
        'insert_placement' => 'getInsertPlacement',
        'insert_path' => 'getInsertPath'
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
        $this->container['input_file_bytes'] = isset($data['input_file_bytes']) ? $data['input_file_bytes'] : null;
        $this->container['input_file_url'] = isset($data['input_file_url']) ? $data['input_file_url'] : null;
        $this->container['paragraph_to_insert'] = isset($data['paragraph_to_insert']) ? $data['paragraph_to_insert'] : null;
        $this->container['insert_placement'] = isset($data['insert_placement']) ? $data['insert_placement'] : null;
        $this->container['insert_path'] = isset($data['insert_path']) ? $data['insert_path'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['input_file_bytes']) && !preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $this->container['input_file_bytes'])) {
            $invalidProperties[] = "invalid value for 'input_file_bytes', must be conform to the pattern /^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/.";
        }

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

        if (!preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $this->container['input_file_bytes'])) {
            return false;
        }
        return true;
    }


    /**
     * Gets input_file_bytes
     *
     * @return string
     */
    public function getInputFileBytes()
    {
        return $this->container['input_file_bytes'];
    }

    /**
     * Sets input_file_bytes
     *
     * @param string $input_file_bytes Optional: Bytes of the input file to operate on
     *
     * @return $this
     */
    public function setInputFileBytes($input_file_bytes)
    {

        if (!is_null($input_file_bytes) && (!preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $input_file_bytes))) {
            throw new \InvalidArgumentException("invalid value for $input_file_bytes when calling InsertDocxInsertParagraphRequest., must conform to the pattern /^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/.");
        }

        $this->container['input_file_bytes'] = $input_file_bytes;

        return $this;
    }

    /**
     * Gets input_file_url
     *
     * @return string
     */
    public function getInputFileUrl()
    {
        return $this->container['input_file_url'];
    }

    /**
     * Sets input_file_url
     *
     * @param string $input_file_url Optional: URL of a file to operate on as input.  This can be a public URL, or you can also use the begin-editing API to upload a document and pass in the secure URL result from that operation as the URL here (this URL is not public).
     *
     * @return $this
     */
    public function setInputFileUrl($input_file_url)
    {
        $this->container['input_file_url'] = $input_file_url;

        return $this;
    }

    /**
     * Gets paragraph_to_insert
     *
     * @return \Swagger\Client\Model\DocxParagraph
     */
    public function getParagraphToInsert()
    {
        return $this->container['paragraph_to_insert'];
    }

    /**
     * Sets paragraph_to_insert
     *
     * @param \Swagger\Client\Model\DocxParagraph $paragraph_to_insert Table you would like to insert
     *
     * @return $this
     */
    public function setParagraphToInsert($paragraph_to_insert)
    {
        $this->container['paragraph_to_insert'] = $paragraph_to_insert;

        return $this;
    }

    /**
     * Gets insert_placement
     *
     * @return string
     */
    public function getInsertPlacement()
    {
        return $this->container['insert_placement'];
    }

    /**
     * Sets insert_placement
     *
     * @param string $insert_placement Optional; default is DocumentEnd.  Placement Type of the insert; possible values are: DocumentStart (very beginning of the document), DocumentEnd (very end of the document), BeforeExistingObject (right before an existing object - fill in the InsertPath field using the Path value from an existing object), AfterExistingObject (right after an existing object - fill in the InsertPath field using the Path value from an existing object)
     *
     * @return $this
     */
    public function setInsertPlacement($insert_placement)
    {
        $this->container['insert_placement'] = $insert_placement;

        return $this;
    }

    /**
     * Gets insert_path
     *
     * @return string
     */
    public function getInsertPath()
    {
        return $this->container['insert_path'];
    }

    /**
     * Sets insert_path
     *
     * @param string $insert_path Optional; location within the document to insert the object; fill in the InsertPath field using the Path value from an existing object.  Used with InsertPlacement of BeforeExistingObject or AfterExistingObject
     *
     * @return $this
     */
    public function setInsertPath($insert_path)
    {
        $this->container['insert_path'] = $insert_path;

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


