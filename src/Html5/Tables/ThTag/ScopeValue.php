<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables\ThTag;

enum ScopeValue: string
{

    /** The header relates to all cells in the row it belongs to. */
    case row = 'row';

    /** The header relates to all cells in the column it belongs to. */
    case col = 'col';

    /** The header belongs to a rowgroup and relates to all of its cells. */
    case rowgroup = 'rowgroup';

    /** The header belongs to a colgroup and relates to all of its cells. */
    case colgroup = 'colgroup';

}
