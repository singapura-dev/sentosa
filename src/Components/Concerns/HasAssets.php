<?php

namespace Sentosa\Components\Concerns;

use Illuminate\Support\Str;
use LogicException;
use Sentosa\Components\Panel\Panel;
use Sentosa\Components\UI\Asset;

trait HasAssets
{
    public array $assets = [];

    public function renderingAssets():void
    {
        foreach ($this->assets as $asset) {

            if (is_string($asset)) {
                if(Str::endsWith($asset, 'css')) {
                    $asset = [
                        'type' =>'css',
                        'src' => $asset
                    ];
                }elseif(Str::endsWith($asset,'js')) {
                    $asset = [
                        'type' =>'js',
                        'src' => $asset
                    ];
                }elseif(Str::startsWith($asset, '<style>')) {
                    $asset = Str::replaceFirst('</style>', '', $asset);
                    $asset = Str::replaceFirst('<style>', '', $asset);
                    $asset = [
                        'type' =>'style',
                        'children' => $asset
                    ];
                }elseif(Str::startsWith($asset, '<script>')) {
                    $asset = Str::replaceFirst('</script>', '', $asset);
                    $asset = Str::replaceFirst('<script>', '', $asset);
                    $asset = [
                        'type' =>'script',
                        'children' => $asset
                    ];
                } else {
                    throw new LogicException('Invalid asset type:'.$asset);
                }
            }
            $type = $asset['type'];

            if(empty($asset['attributes'])) {
                $asset['attributes'] = [];
            }

            switch ($type) {
                case 'css':
                    $wrapper = 'link';
                    $asset['attributes']['rel'] = 'stylesheet';
                    $asset['attributes']['href'] = $asset['src'];
                    $position = Panel::CHILDREN_POSITION_STYLE;
                    $closable = false;
                    break;
                case 'js':
                    $closable = true;
                    $wrapper = 'script';
                    $asset['attributes']['src'] = $asset['src'];
                    $asset['attributes']['type'] = $asset['attributes']['type'] ?? 'text/javascript';
                    $position = Panel::CHILDREN_POSITION_SCRIPT;
                    break;
                case 'style':
                    $closable = true;
                    $wrapper = 'style';
                    $position = Panel::CHILDREN_POSITION_STYLE;
                    break;
                case 'script':
                    $closable = true;
                    $wrapper = 'script';
                    $position = Panel::CHILDREN_POSITION_SCRIPT;
                    break;
                default:
                    throw new LogicException('Invalid asset type');
            }

            if(!empty($asset['position'])) {
                $position = $asset['position'];
            }

            $component = Asset::make(wrapper: $wrapper, closable: $closable);
            $component->withAttributes($asset['attributes']);

            if(!empty($asset['children'])) {
                $component->children($asset['children']);
            }
            $component->withAttributes(['nonce' => 'csp_nonce']);
            panel()->children($component, $position);
        }
    }
}
