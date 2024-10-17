import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Editor

import hljs from 'highlight.js/lib/core';
import sql from 'highlight.js/lib/languages/sql';
import { CodeJar } from 'codejar';

function extendedSQL(hljs) {
    const originalLanguage = sql(hljs);
    
    const extendedString = {
      className: 'string',
      variants: [
        {
          begin: /'/,
          end: /'/,
          contains: [{ begin: /''/ }]
        },
        // support also `""` for strings
        {
          begin: /"/,
          end: /"/,
          contains: [{ begin: /""/ }]
        }
      ]
    };
    
    originalLanguage.contains = originalLanguage.contains.map(rule => 
      rule.className === 'string' ? extendedString : rule
    );
    
    return originalLanguage;
}
hljs.registerLanguage('sql', extendedSQL);

window.hljs = hljs;
window.CodeJar = CodeJar;
