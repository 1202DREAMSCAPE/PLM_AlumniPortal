import {
  Livewire,
  Alpine,
} from '../../vendor/livewire/livewire/dist/livewire.esm'

import './bootstrap';

import Tooltip from '@ryangjchandler/alpine-tooltip'

Alpine.plugin(Tooltip)

Livewire.start()
