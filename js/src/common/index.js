import 'expose-loader?$!expose-loader?jQuery!jquery';
import 'expose-loader?m!mithril';
import 'expose-loader?moment!expose-loader?dayjs!dayjs';
import 'expose-loader?m.bidi!m.attrs.bidi';
import 'bootstrap/js/affix';
import 'bootstrap/js/dropdown';
import 'bootstrap/js/modal';
import 'bootstrap/js/tooltip';
import 'bootstrap/js/transition';
import 'jquery.hotkeys/jquery.hotkeys';

import patchMithril from './utils/patchMithril';

import relativeTime from 'dayjs/plugin/relativeTime';
import localizedFormat from 'dayjs/plugin/localizedFormat';
import utc from 'dayjs/plugin/utc';

dayjs.extend(relativeTime);
dayjs.extend(localizedFormat);
dayjs.extend(utc);

patchMithril(window);

import * as Extend from './extend/index';

export { Extend };
