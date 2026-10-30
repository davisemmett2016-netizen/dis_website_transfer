# Davis Southern Septic - static site for Cloudflare Pages

## Deploy
1. In this folder: `npx wrangler login`
2. `npx wrangler pages deploy site --project-name davis-southern-septic`
   (Drag-and-drop upload ignores `functions/`, so the form would not work. Use wrangler or Git.)
3. Dashboard > Workers & Pages > project > Settings > Variables and Secrets:
   - RESEND_API_KEY (resend.com; verify your sending domain with their DNS records)
   - MAIL_FROM e.g. `Davis Southern Septic <quotes@davissouthernseptic.com>`
   - MAIL_TO (default contact@davissouthernseptic.com)
   - LEAD_WEBHOOK_URL / LEAD_WEBHOOK_TOKEN (optional: forwards each lead as JSON to your platform)
4. Custom domains tab: add davissouthernseptic.com and www. Keep existing MX (email) and app subdomain records.
5. Test: submit the form, tap the phone number, open /privacy-policy/ and /terms/.

## Editing
Edit `generator/theme/`, run `php generator/build.php`, redeploy.
Placeholders to fix: review count ("47"), footer hours, legal name in privacy/terms.
