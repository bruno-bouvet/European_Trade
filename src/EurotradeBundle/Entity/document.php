<?php

namespace EurotradeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * document
 */
class document
{
    public function __toString()
    {
        return $this->url;
    }

    /**
     * @Assert\Image(
     *     maxSize = '1k',
     *     mimeTypes = {"image/*"},
     *     maxSizeMessage = "The maxmimum allowed file size is 1MB.",
     *     mimeTypesMessage = "Please upload a valid Image.")
     */
    public $doc;

    protected function getUploadDir()
    {
        return 'uploads/images';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->url ? null : $this->getUploadDir().'/'.$this->url;
    }

    public function getAbsolutePath()
    {
        return null === $this->url ? null : $this->getUploadRootDir().'/'.$this->url;
    }


    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->doc) {
// "uniquid()" permet de créer une id de manière aléatoire
// Récupère l'extension du fichier
            $this->url = uniqid().'.'.$this->doc->guessExtension();
        }
    }


    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->doc) {
            return;
        }
// If there is an error when moving the file, an exception will
// be automatically thrown by move(). This will properly prevent
// the entity from being persisted to the database on error
        $this->doc->move($this->getUploadRootDir(), $this->url);

        unset($this->doc);
    }


    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($doc = $this->getAbsolutePath()) {
            unlink($doc);
        }
    }


/////// GENERATED CODE ////////////////////

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \EurotradeBundle\Entity\blog
     */
    private $blog;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return document
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return document
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return document
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set blog
     *
     * @param \EurotradeBundle\Entity\blog $blog
     *
     * @return document
     */
    public function setBlog(\EurotradeBundle\Entity\blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \EurotradeBundle\Entity\blog
     */
    public function getBlog()
    {
        return $this->blog;
    }
}
