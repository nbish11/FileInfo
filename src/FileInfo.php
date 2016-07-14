<?php

/**
 * Custom FileInfo wrapper.
 *
 * @version 1.0.0
 * @author Nathan Bishop (nbish11)
 * @copyright 2016 Nathan Bishop
 * @license MIT
 *
 * @property string $directory
 * @property string $basename
 * @property string $extension
 * @property string $filename
 * @property string $mimetype
 */
class FileInfo
{
    /**
     * If a mimetype was NOT found this will be returned; which in
     * most cases is more than sufficient.
     *
     * @var string
     */
    const DEFAULT_MIMETYPE = 'application/octet-stream';

    /**
     * The file to check for.
     *
     * @var string
     */
    private $file;

    /**
     * Constructs a new `FileInfo` instance.
     *
     * @param string  $file   Path to file.
     * @param boolean $exists Check if file exists.
     */
    public function __construct($file, $exists = false)
    {
        if ( ! is_string($file)) {
            throw new InvalidArgumentException('FileInfo expects a string.');
        }

        if ($exists && !file_exists($file)) {
            throw new Exception('The file was not found at the following location: ' . $file);
        }

        $this->file = $file;
    }

    /**
     * Retrieve the directory of the file.
     *
     * @return string E.g. C:/wamp/www/FileInfo/src
     */
    public function getDirectory()
    {
        return dirname($this->file);
    }

    /**
     * Retrieve the filename and the extension.
     *
     * @return string E.g. FileInfo.php
     */
    public function getBaseName()
    {
        return basename($this->file);
    }

    /**
     * The extension of the file.
     *
     * @return string E.g. php
     */
    public function getExtension()
    {
        return substr(strrchr($this->getBasename(), '.'), 1);
    }

    /**
     * The basename without the extension.
     *
     * @return string E.g. FileInfo
     */
    public function getFileName()
    {
        return basename($this->file, '.' . $this->getExtension());
    }

    /**
     * The content-type/mimetype of the file.
     *
     * @return string E.g. application/octet-stream
     */
    public function getMimeType()
    {
        $ext = $this->getExtension();
        $mimes = $this->getMimeTypes();

        return isset($mimes[$ext]) ? $mimes[$ext] : self::DEFAULT_MIMETYPE;
    }

    /**
     * Checks if an arbitrary property exists.
     *
     * @param  string $key
     * @return boolean
     */
    public function __isset($key)
    {
        $allowed = array(
            'directory',
            'basename',
            'extension',
            'filename',
            'mimetype'
        );

        return in_array(strtolower($key), $allowed);
    }

    /**
     * Retrieve an arbitrary property.
     *
     * @param  string $key
     * @return string
     */
    public function __get($key)
    {
        switch (strtolower($key)) {
            case 'directory':
                return $this->getDirectory();

            case 'basename':
                return $this->getBaseName();

            case 'extension':
                return $this->getExtension();

            case 'filename':
                return $this->getFileName();

            case 'mimetype':
                return $this->getMimeType();

            default:
                return null;
        }
    }

    /**
     * Retrieve a list of supported mime-types.
     *
     * Based on Apache's "mime.types" file.
     *
     * @return array
     */
    private function getMimeTypes()
    {
        return json_decode(file_get_contents(__DIR__ . '/mediatypes.json'), true);
    }
}
