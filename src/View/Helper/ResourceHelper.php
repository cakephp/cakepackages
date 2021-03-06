<?php
namespace App\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;

/**
 * Resource Helper
 */
class ResourceHelper extends AppHelper
{

    public $helpers = ['Form', 'Html', 'Text', 'Time'];

    /**
     * Returns an HTML link for a package
     *
     * @param string $name Package display name
     * @param int $packageId Package id
     * @param string $slug Slug for package
     * @return string
     */
    public function packageLink($name, $packageId, $slug)
    {
        return $this->Html->link($name, [
            'plugin' => null,
            'controller' => 'packages',
            'action' => 'view',
            'id' => $packageId,
            'slug' => $slug,
        ], ['title' => $name]);
    }

    /**
     * Returns a link to a package
     *
     * @param string $name Package display name
     * @param int $packageId Package id
     * @return string
     */
    public function packageUrl($name, $packageId)
    {
        return $this->url([
            'plugin' => null,
            'controller' => 'packages',
            'action' => 'view',
            'id' => $package['id'],
            'slug' => $package['name'],
        ]);
    }

    public function githubUrl($maintainer, $package, $name = null)
    {
        $link = "https://github.com/{$maintainer}/{$package}";
        if ($name === null) {
            $name = $link;
        }

        return $this->Html->link($name, $link, [
            'target' => '_blank',
            'class' => 'external github-external',
            'package-name' => "{$maintainer}-{$package}",
        ]);
    }

    public function cloneUrl($maintainer, $name)
    {
        return $this->Form->input('clone', [
            'class' => 'form-control clone-url',
            'div' => false,
            'label' => false,
            'value' => "git://github.com/{$maintainer}/{$name}.git",
        ]);
    }

    public function gravatar($username, $avatarUrl, $gravatarId = null)
    {
        if (empty($avatarUrl) && empty($gravatarId)) {
            return '';
        }

        if (empty($avatarUrl)) {
            $avatarUrl = sprintf('https://secure.gravatar.com/avatar/%s', $gravatarId);
        }

        return $this->Html->image($avatarUrl, [
            'alt' => 'Gravatar for ' . $username,
            'class' => 'img-circle',
        ]);
    }

    public function description($text)
    {
        return $this->Html->tag('p', $this->Text->truncate(
            $this->Text->autoLink(trim($text)),
            100,
            ['html' => true]
        ), ['class' => 'lead']);
    }

    public function sort($order)
    {
        list($order, $direction) = explode(' ', $order);
        list(, $sortField) = explode('.', $order);

        if ($direction == 'asc') {
            $direction = 'desc';
        } else {
            $direction = 'asc';
        }

        $order = null;

        $output = [];
        foreach (Package::$validShownOrders as $sort => $name) {
            if ($sort == $sortField) {
                $output[] = $this->Html->link($name, ['?' => array_merge(
                    (array)$this->_View->request->query,
                    compact('sort', 'direction', 'order')
                )], ['class' => 'active ' . $direction]);
            } else {
                $output[] = $this->Html->link($name, ['?' => array_merge(
                    (array)$this->_View->request->query,
                    ['sort' => $sort, 'direction' => 'desc', 'order' => $order]
                )]);
            }
        }

        return implode(' ', $output);
    }

    public function tagCloud($tags)
    {
        $tags = explode(',', $tags);
        sort($tags);

        $links = [];
        foreach ($tags as $tag) {
            if ($tag === '') {
                continue;
            }
            $links[] = $this->tagLink($tag);
        }

        return implode("\n", $links);
    }

    public function tagLink($tag)
    {
        $colorMap = [
            'version:4' => '#D33C44',
            'version:3' => '#27a4dd',
            'version:2' => '#9dd5c0',
            'version:1.3' => '#ffaaa5',
            'version:1.2' => '#ffd3b6',
        ];
        list($key, $value) = explode(':', $tag, 2);
        $options = ['class' => 'label category-label'];
        $queryString = [$key => $value];
        $url = ['controller' => 'packages', 'action' => 'index'];

        if (isset($colorMap[$tag])) {
            $queryString = ['version' => $value];
            $url['?'] = $queryString;
            $options['style'] = $this->styleTag($colorMap[$tag]);
            $version = strpos($key, '.') === false ? $value . '.x' : $value;

            return $this->Html->link('version:' . $version, $url, $options);
        }

        $color = '#000000';
        if (in_array($key, ['has', 'keyword'])) {
            $color = $key == 'has' ? '#808080' : '#A9A9A9';
            $queryString = [
                $key => [$value],
            ];
        }

        $url['?'] = $queryString;
        $options['style'] = $this->styleTag($color);

        return $this->Html->link($tag, $url, $options);
    }

    /**
     * Calculates contrast text color for a given color
     *
     * @param string $color RGB color code with a leading "#"
     *
     * @return string Color
     */
    public function contrastColor($color)
    {
        $rgb = substr($color, 1);

        list ($r, $g, $b) = array_map('hexdec', str_split($rgb, 2));

        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

        return $brightness > 128
            ? '#363637'
            : 'white';
    }

    /**
     * Generates a style tag
     *
     * @param string $color Color
     *
     * @return string Style
     */
    public function styleTag($color)
    {
        return sprintf(
            'background-color:%s;color:%s',
            $color,
            $this->contrastColor($color)
        );
    }
}
