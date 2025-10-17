<?php

namespace Sentosa\Components\Panel\Concerns;

use Sentosa\Components\UI\Header;

/**
 * @method static pageTitle(string $title) Set page title to html head
 * @method static headerTitle($title) Set page header title
 * @method static headerSubTitle($title)
 * @method static headerRight($right)
 * @method string getHeaderTitle()
 * @method string getHeaderSubTitle()
 * @method string getHeaderRight()
 */
trait HasPage
{
    public mixed $pageTitle = null;
    public mixed $headerTitle = null;
    public mixed $headerSubTitle = null;
    public mixed $headerLeft = null;
    public mixed $headerRight = null;

    public function renderingPageHeader(): void
    {
        if(!empty($this->headerTitle) || !empty($this->headerRight)) {
            $header = Header::make([
                'title'    => $this->getHeaderTitle(),
                'subtitle' =>$this->getHeaderSubTitle(),
                'right' => $this->getHeaderRight(),
            ]);
            $this->children($header, static::CHILDREN_POSITION_HEADER);
        }
    }
}
