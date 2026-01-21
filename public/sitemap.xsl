<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:xhtml="http://www.w3.org/1999/xhtml">
    
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    
    <xsl:template match="/">
        <html>
            <head>
                <title>XML Sitemap - stanchevisin.com</title>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }
                    
                    body {
                        font-family: Arial, Helvetica, sans-serif;
                        background: #fff;
                        padding: 20px;
                        color: #000;
                    }
                    
                    .container {
                        max-width: 100%;
                        margin: 0 auto;
                    }
                    
                    .header {
                        padding: 20px 0;
                        border-bottom: 1px solid #ddd;
                        margin-bottom: 20px;
                    }
                    
                    .header h1 {
                        font-size: 1.5em;
                        margin-bottom: 5px;
                        font-weight: normal;
                    }
                    
                    .info {
                        margin-bottom: 20px;
                        font-size: 0.9em;
                    }
                    
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        font-size: 13px;
                    }
                    
                    thead {
                        background: #f0f0f0;
                    }
                    
                    th {
                        padding: 10px;
                        text-align: left;
                        font-weight: bold;
                        color: #000;
                        border: 1px solid #ddd;
                        background: #e8e8e8;
                    }
                    
                    td {
                        padding: 8px 10px;
                        border: 1px solid #ddd;
                    }
                    
                    tr:nth-child(even) {
                        background: #f9f9f9;
                    }
                    
                    tr:hover {
                        background: #f0f0f0;
                    }
                    
                    .url-link {
                        color: #0066cc;
                        text-decoration: none;
                    }
                    
                    .url-link:hover {
                        text-decoration: underline;
                    }
                    
                    .priority {
                        text-align: right;
                    }
                    
                    @media (max-width: 768px) {
                        body {
                            padding: 10px;
                        }
                        
                        table {
                            font-size: 11px;
                        }
                        
                        th, td {
                            padding: 6px 4px;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>Sitemap file: https://stanchevisin.com/sitemap.xml</h1>
                    </div>
                    
                    <div class="info">
                        Number of URLs in this sitemap: <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>URL location</th>
                                <th>Last modification date</th>
                                <th>Change frequency</th>
                                <th style="text-align: right;">Priority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="sitemap:urlset/sitemap:url">
                                <tr>
                                    <td>
                                        <a class="url-link" href="{sitemap:loc}">
                                            <xsl:value-of select="sitemap:loc"/>
                                        </a>
                                    </td>
                                    <td>
                                        <xsl:value-of select="sitemap:lastmod"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="sitemap:changefreq"/>
                                    </td>
                                    <td class="priority">
                                        <xsl:value-of select="sitemap:priority"/>
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </div>
            </body>
        </html>
    </xsl:template>
    
</xsl:stylesheet>
