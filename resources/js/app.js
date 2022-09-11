import './bootstrap';

import _ from 'lodash';
window._ = _;

import Alpine from 'alpinejs';
window.Alpine = Alpine;

import {LivewireHotReload} from 'virtual:livewire-hot-reload'
LivewireHotReload();

Alpine.start();
