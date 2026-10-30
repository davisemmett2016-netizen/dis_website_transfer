<?php get_header(); ?>
<?php if(!function_exists('dss_get_counties_cities')) require_once get_stylesheet_directory().'/template-parts/city-data.php'; ?>

<!-- HERO -->
<section id="dss-hero">
  <div class="hero-dots"></div>
  <div class="hero-glow"></div>
  <div class="dss-wrap">
    <div class="hero-grid">

      <!-- Hero Content -->
      <div class="hero-content">
        <div class="hero-badge">Georgia&rsquo;s Trusted Septic Experts</div>
        <h1 class="hero-h1">Atlanta Metro Septic Service,<span>Done Right.</span></h1>
        <p class="hero-p">Metro Atlanta&rsquo;s trusted choice for septic pumping, grease trap cleaning, septic repairs, installations, and real estate inspections. Davis Southern Septic provides state-certified residential and commercial septic services with fast scheduling and reliable results across Georgia.</p>
        <div class="hero-btns">
          <a href="tel:4708394441" class="btn btn-primary">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07A19.5 19.5 0 013.07 13.5a19.8 19.8 0 01-3.07-8.67A2 2 0 012 2.84h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L6.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 17.92z"/></svg>
            Call Now
          </a>
          <a href="#dss-quote-form" class="btn btn-outline-white hero-quote-btn">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            Request a Quote Online
          </a>
        </div>
      </div>

      <!-- TWO-STEP QUOTE FORM -->
      <div class="quote-card" id="dss-quote-form">

        <!-- Progress indicator -->
        <div class="dss-two-step">

          <div class="dss-step-progress" aria-label="Form progress">
            <div class="dss-dot active" aria-label="Step 1">
              <div class="dss-dot-circle">1</div>
              Your Info
            </div>
            <div class="dss-dot-line"></div>
            <div class="dss-dot" aria-label="Step 2">
              <div class="dss-dot-circle">2</div>
              More Details
            </div>
          </div>

          <!-- ══ STEP 1 ══ -->
          <div class="dss-step-1">
            <span class="dss-step-label">Step 1 of 2</span>
            <div class="dss-step-heading">Request Immediate Service</div>

            <form class="qf" method="post">
              <input type="text" name="company_website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0;" />

              <div class="row2">
                <div>
                  <label for="hp-fname">First Name *</label>
                  <input type="text" id="hp-fname" name="first_name" placeholder="John" required />
                </div>
                <div>
                  <label for="hp-lname">Last Name</label>
                  <input type="text" id="hp-lname" name="last_name" placeholder="Smith" />
                </div>
              </div>

              <label for="hp-phone">Phone Number *</label>
              <input type="tel" id="hp-phone" name="phone" placeholder="(404) 000-0000" required />

              <label for="hp-service">Service Needed</label>
              <select id="hp-service" name="service">
                <option value="">&#8212; Select a Service &#8212;</option>
                <option>Septic Pumping</option>
                <option>Installs &amp; Maintenance</option>
                <option>Grease Trap Cleaning</option>
                <option>Real Estate Inspections</option>
                <option>Septic Repairs</option>
                <option>Emergency Service</option>
                <option>Not Sure &mdash; Need Advice</option>
              </select>

              <button type="submit" class="btn btn-primary btn-full" style="margin-top:6px;">
                Next &#8594;
              </button>
              <p style="margin:12px 0 0; font-size:.72rem; line-height:1.5; color:rgba(255,255,255,.6);">By submitting, you agree to receive text messages from Davis Southern Septic about your request, quotes, and appointments. Message frequency varies. Message and data rates may apply. Reply STOP to opt out or HELP for help. Consent is not a condition of purchase. See our <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" style="color:inherit;text-decoration:underline;">Privacy Policy</a> and <a href="<?php echo esc_url(home_url('/terms')); ?>" style="color:inherit;text-decoration:underline;">Terms</a>.</p>
            </form>
          </div>

          <!-- ══ STEP 2 ══ -->
          <div class="dss-step-2">
            <span class="dss-step-label">Step 2 of 2</span>
            <div class="dss-step-heading">Additional Details <span style="font-size:.8rem;opacity:.6;font-family:var(--sans);font-weight:400;">(Optional)</span></div>

            <div class="dss-optional-badge">
              &#10003; &nbsp;Request received! Add details below to help us prepare.
            </div>

            <form class="qf" method="post">
              <input type="hidden" name="customer_name" />
              <input type="hidden" name="customer_phone" />
              <input type="hidden" name="customer_service" />

              <label for="hp2-email">Email Address</label>
              <input type="email" id="hp2-email" name="email" placeholder="john@email.com" />

              <label for="hp2-address">Service Address</label>
              <input type="text" id="hp2-address" name="address" placeholder="123 Main St, City, GA 30214" />

              <label for="hp2-photos">Upload Photos</label>
              <input type="file" id="hp2-photos" name="photos" accept="image/*" multiple
                style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.7);padding:10px 14px;border:1px solid rgba(255,255,255,.15);border-radius:8px;width:100%;margin-bottom:14px;font-size:.84rem;" />

              <label for="hp2-msg">Describe the Issue</label>
              <textarea id="hp2-msg" name="message" rows="3" placeholder="Any details that help us prepare for your visit&hellip;"></textarea>

              <button type="submit" class="btn btn-primary btn-full" style="margin-top:6px;">
                Submit Details &#8594;
              </button>
              <button type="button" class="dss-skip-btn">
                No thanks, I&rsquo;m done &mdash; skip this step
              </button>
            </form>
          </div>

        </div><!-- /.dss-two-step -->
      </div><!-- /.quote-card -->

    </div>
  </div>
</section>

<!-- TRUST STRIP -->
<div id="dss-trust">
  <div class="dss-wrap">
    <div class="trust-row">
      <div class="trust-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Licensed &amp; Insured</div>
      <div class="trust-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> 24/7 Emergency Service</div>
      <div class="trust-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg> Transparent Flat-Rate Pricing</div>
      <div class="trust-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> Family-Owned &amp; Local</div>
    </div>
  </div>
</div>

<!-- ABOUT INTRO -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="two-col">
      <div class="two-col-img">
        <div class="img-frame">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/team-photo.png" alt="Davis Southern Septic Team" style="width:100%;height:100%;object-fit:cover;" />
        </div>
      </div>
      <div class="two-col-text">
        <span class="tag">Who We Are</span>
        <h2 class="section-title">Georgia&rsquo;s Septic Specialists: <span>Built on Trust</span></h2>
        <p class="section-sub">Davis Southern Septic has served Metro Atlanta homeowners, property managers, and businesses for over a decade. We show up on time, explain every step, and leave your property clean every visit.</p>
        <ul class="check-list" style="margin:24px 0 32px;">
          <li>Locally owned &mdash; we live in the communities we serve</li>
          <li>State-certified technicians with hands-on field experience</li>
          <li>Modern vacuum trucks and diagnostic equipment</li>
          <li>Honest assessments &mdash; no unnecessary upsells</li>
          <li>Residential and commercial properties welcome</li>
        </ul>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
          <a href="tel:4708394441" class="btn btn-primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align:-2px;margin-right:4px;"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07A19.5 19.5 0 013.07 13.5a19.8 19.8 0 01-3.07-8.67A2 2 0 012 2.84h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L6.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 17.92z"/></svg>
            Call Now
          </a>
          <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-dark">Our Story</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="dss-section dss-section--light">
  <div class="dss-wrap">
    <div class="text-center" style="margin-bottom:48px;">
      <span class="tag">What We Offer</span>
      <h2 class="section-title">Complete Septic Solutions for <span>Every Need</span></h2>
      <p class="section-sub">From new system installs to routine pumping and commercial grease trap service all handled professionally and on schedule.</p>
    </div>
    <div class="svc-grid">

      <article class="svc-card">
        <div class="svc-card-top">
          <div class="svc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
          <div class="svc-card-name">Installs &amp; Maintenance</div>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">State-certified septic system installation for new construction, replacements, and property developments designed for long-term performance, efficiency, and full Georgia code compliance.</p>
          <ul class="svc-mini-list">
            <li>Site evaluation &amp; system planning</li>
            <li>Permitting coordination &amp; code-compliant installation</li>
            <li>Residential &amp; commercial septic systems</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>" class="svc-link">Learn More &#8594;</a>
        </div>
      </article>

      <article class="svc-card">
        <div class="svc-card-top">
          <div class="svc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div>
          <div class="svc-card-name">Grease Trap Cleaning</div>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">Professional grease trap cleaning, pumping, maintenance, and repairs for restaurants, cafes, food trucks, churches, schools, and commercial kitchens across Georgia.</p>
          <ul class="svc-mini-list">
            <li>Complete pump-out &amp; interior cleaning</li>
            <li>Compliance documentation provided</li>
            <li>Flexible scheduling for businesses</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>" class="svc-link">Learn More &#8594;</a>
        </div>
      </article>

      <article class="svc-card">
        <div class="svc-card-top">
          <div class="svc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
          <div class="svc-card-name">Real Estate Inspections</div>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">Professional septic inspections for homebuyers, sellers, realtors, and property owners across Georgia. Detailed reports, photos, and fast turnaround times.</p>
          <ul class="svc-mini-list">
            <li>Full system locate &amp; access</li>
            <li>Written report for closing</li>
            <li>Same-week availability</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>" class="svc-link">Learn More &#8594;</a>
        </div>
      </article>

      <article class="svc-card">
        <div class="svc-card-top">
          <div class="svc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
          <div class="svc-card-name">Pumping &amp; Inspections</div>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">Professional septic pumping, inspections, and maintenance for homeowners and businesses across Metro Atlanta and Georgia. Prevent backups, odors, and costly drain field failures.</p>
          <ul class="svc-mini-list">
            <li>Complete waste removal &amp; pump-out</li>
            <li>Tank baffle &amp; lid inspection</li>
            <li>Drain field observation</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>" class="svc-link">Learn More &#8594;</a>
        </div>
      </article>

      <article class="svc-card svc-card--wide">
        <div class="svc-card-top">
          <div class="svc-icon" style="background:#e05c5c;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
          <div class="svc-card-name">24/7 Emergency Septic Service</div>
        </div>
        <div class="svc-card-body">
          <div class="svc-card-desc-col">
            <p class="svc-card-desc">Sewage backup? Foul odors? Standing water in the yard? We&rsquo;re available around the clock. Call now and a technician will be dispatched promptly.</p>
            <a href="tel:4708394441" class="btn btn-primary btn-sm" style="margin-top:8px;">&#128222; Call Now</a>
          </div>
          <ul class="svc-mini-list">
            <li>24/7/365 &mdash; no holiday fees</li>
            <li>Sewage backup clearing &amp; cleanup</li>
            <li>Broken pipe &amp; line repair</li>
            <li>Fast dispatch across Metro Atlanta</li>
          </ul>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- PRICING SECTION -->
<style>
/* Scoped pricing styles — independent of stylesheet cache */
#dss-pricing { background:#f4f8fc; padding:80px 0; }
#dss-pricing .pc-wrap { max-width:1200px; margin:0 auto; padding:0 24px; }
#dss-pricing .pc-header { text-align:center; margin-bottom:52px; }
#dss-pricing .pc-tag { display:inline-block; background:#e8f3fd; color:#3a87d4; border-radius:50px; padding:6px 18px; font-size:.75rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase; margin-bottom:14px; }
#dss-pricing .pc-title { font-size:clamp(1.75rem,3.5vw,2.5rem); font-weight:700; color:#0f1b2d; margin:0 0 12px; line-height:1.2; }
#dss-pricing .pc-title span { color:#3a87d4; }
#dss-pricing .pc-sub { font-size:1rem; color:#3d4f62; max-width:560px; margin:0 auto; line-height:1.7; }
#dss-pricing .pc-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
#dss-pricing .pc-card {
  background:#fff; border-radius:18px; padding:28px 22px 24px;
  border:2px solid #e4edf6; display:flex; flex-direction:column;
  box-shadow:0 2px 12px rgba(15,27,45,.06);
  transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
#dss-pricing .pc-card:hover { transform:translateY(-6px); box-shadow:0 12px 36px rgba(15,27,45,.12); border-color:#6CAFF4; }
#dss-pricing .pc-icon {
  width:54px; height:54px; border-radius:14px; background:#6CAFF4;
  display:flex; align-items:center; justify-content:center;
  margin-bottom:16px; flex-shrink:0;
}
#dss-pricing .pc-icon svg { display:block; }
#dss-pricing .pc-name { font-size:.97rem; font-weight:700; color:#0f1b2d; line-height:1.3; margin-bottom:14px; min-height:40px; }
#dss-pricing .pc-divider { height:1px; background:#e4edf6; margin:0 0 14px; }
#dss-pricing .pc-from { font-size:.72rem; text-transform:uppercase; letter-spacing:.08em; color:#6b7a8d; font-weight:600; }
#dss-pricing .pc-price { font-size:2.6rem; font-weight:800; color:#3a87d4; line-height:1.1; margin:2px 0 16px; }
#dss-pricing .pc-list { list-style:none; padding:0; margin:0 0 20px; flex:1; display:flex; flex-direction:column; gap:8px; }
#dss-pricing .pc-list li { font-size:.86rem; color:#3d4f62; padding-left:22px; position:relative; line-height:1.4; }
#dss-pricing .pc-list li::before { content:"✓"; position:absolute; left:0; color:#6CAFF4; font-weight:700; font-size:.9rem; }
#dss-pricing .pc-btn {
  display:block; background:#6CAFF4; color:#fff; text-align:center;
  padding:12px 16px; border-radius:50px; font-size:.88rem; font-weight:700;
  text-decoration:none; transition:background .2s ease;
  margin-top:auto;
}
#dss-pricing .pc-btn:hover { background:#3a87d4; color:#fff; }
#dss-pricing .pc-note { text-align:center; font-size:.82rem; color:#6b7a8d; max-width:600px; margin:36px auto 0; line-height:1.65; }
#dss-pricing .pc-note strong { color:#0f1b2d; }

@media (max-width:1024px) { #dss-pricing .pc-grid { grid-template-columns:repeat(2,1fr); } #dss-pricing .pc-name { min-height:auto; } }
@media (max-width:580px)  { #dss-pricing .pc-grid { grid-template-columns:1fr; } #dss-pricing .pc-price { font-size:2.2rem; } }
</style>

<section id="dss-pricing">
  <div class="pc-wrap">

    <div class="pc-header">
      <div class="pc-tag">Transparent Pricing</div>
      <h2 class="pc-title">Honest Rates, <span>No Surprises</span></h2>
      <p class="pc-sub">We believe you deserve to know what service costs before you call. Every job is different &mdash; these are common starting points. Final pricing confirmed before work begins.</p>
    </div>

    <div class="pc-grid">

      <!-- Septic Pumping -->
      <div class="pc-card">
        <div class="pc-icon" style="background:#6CAFF4;">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <div class="pc-name">Residential Septic Pumping</div>
        <div class="pc-divider"></div>
        <div class="pc-from">Starting at</div>
        <div class="pc-price">$630</div>
        <ul class="pc-list">
          <li>Full tank pump-out</li>
          <li>Baffle &amp; lid inspection</li>
          <li>Drain field observation</li>
          <li>Same-week scheduling</li>
        </ul>
        <a href="#dss-quote-form" class="pc-btn">Get Your Quote</a>
      </div>

      <!-- Grease Trap -->
      <div class="pc-card">
        <div class="pc-icon" style="background:#16a34a;">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        </div>
        <div class="pc-name">Commercial Grease Trap Cleaning</div>
        <div class="pc-divider"></div>
        <div class="pc-from">Starting at</div>
        <div class="pc-price">$90</div>
        <ul class="pc-list">
          <li>Complete pump-out &amp; clean</li>
          <li>Compliance documentation</li>
          <li>Flexible scheduling</li>
          <li>Recurring service discounts</li>
        </ul>
        <a href="#dss-quote-form" class="pc-btn" style="background:#16a34a;">Get Your Quote</a>
      </div>

      <!-- Installation -->
      <div class="pc-card">
        <div class="pc-icon" style="background:#7c3aed;">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="pc-name">New Septic System Installation</div>
        <div class="pc-divider"></div>
        <div class="pc-from">Starting at</div>
        <div class="pc-price">$12,000</div>
        <ul class="pc-list">
          <li>Site evaluation &amp; soil testing</li>
          <li>Permit coordination</li>
          <li>Full system installation</li>
          <li>Inspection &amp; sign-off</li>
        </ul>
        <a href="#dss-quote-form" class="pc-btn" style="background:#7c3aed;">Get Your Quote</a>
      </div>

      <!-- Real Estate Inspection -->
      <div class="pc-card">
        <div class="pc-icon" style="background:#ea580c;">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        </div>
        <div class="pc-name">Real Estate Septic Inspection</div>
        <div class="pc-divider"></div>
        <div class="pc-from">Starting at</div>
        <div class="pc-price">$395</div>
        <ul class="pc-list">
          <li>Full system locate &amp; access</li>
          <li>Written report with photos</li>
          <li>24-hr turnaround available</li>
          <li>Accepted by realtors statewide</li>
        </ul>
        <a href="#dss-quote-form" class="pc-btn" style="background:#ea580c;">Get Your Quote</a>
      </div>

    </div>

    <p class="pc-note"><strong>Prices shown are common starting points</strong> for standard Metro Atlanta jobs. Final pricing depends on tank size, access, system condition, and location &mdash; you&rsquo;ll always receive a confirmed quote before work begins. No hidden fees, ever.</p>

  </div>
</section>

<!-- CTA BAND -->
<div class="cta-band">
  <div class="dss-wrap cta-band-inner">
    <h2>Ready for Reliable Septic Service?</h2>
    <p>Our team is standing by to answer questions, schedule service, or respond to an emergency. Straight answers, honest work.</p>
    <div class="cta-band-btns">
      <a href="tel:4708394441" class="btn btn-primary">&#128222; Call Now</a>
      <a href="#dss-quote-form" class="btn btn-outline-white">Request a Quote Online</a>
    </div>
  </div>
</div>

<!-- GOOGLE REVIEWS -->
<section class="dss-section dss-section--light" id="dss-reviews">
  <div class="dss-wrap">

    <div class="text-center" style="margin-bottom:48px;">
      <span class="tag">What Customers Say</span>
      <h2 class="section-title">Trusted Across <span>Metro Atlanta</span></h2>
      <!-- Google aggregate badge -->
      <div class="dss-grating-badge">
        <div class="dss-grating-logo">
          <svg width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
          </svg>
        </div>
        <div class="dss-grating-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <div class="dss-grating-text">
          <strong>4.9</strong> out of 5 &nbsp;&bull;&nbsp; <strong>47</strong> Google Reviews
        </div>
        <a href="https://www.google.com/maps/place/Davis+Southern+Septic/@33.7881144,-85.0124387,9z/data=!3m1!4b1!4m6!3m5!1s0xac1735369927ab83:0xb4a1dcf4027c67a1!8m2!3d33.7887265!4d-84.35304!16s%2Fg%2F11z8syhx7y" target="_blank" rel="noopener" class="dss-grating-link">See all reviews &#8594;</a>
      </div>
    </div>

    <!-- Review cards -->
    <div class="dss-reviews-grid">

      <div class="dss-review-card">
        <div class="dss-review-top">
          <div class="dss-review-avatar">JM</div>
          <div>
            <div class="dss-review-name">James M.</div>
            <div class="dss-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
          <div class="dss-review-glogo" title="Google Review">
            <svg width="14" height="14" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <p class="dss-review-text">"Called Davis Southern on a Friday afternoon with a backed-up system. They were out the next morning, diagnosed the issue quickly, and had everything pumped and running by noon. Professional, honest, and left the yard spotless."</p>
        <div class="dss-review-meta">McDonough, GA &bull; Septic Pumping</div>
      </div>

      <div class="dss-review-card">
        <div class="dss-review-top">
          <div class="dss-review-avatar" style="background:#16a34a;">SR</div>
          <div>
            <div class="dss-review-name">Sarah R.</div>
            <div class="dss-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
          <div class="dss-review-glogo" title="Google Review">
            <svg width="14" height="14" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <p class="dss-review-text">"Used them for a real estate inspection before closing on a home in Peachtree City. Had a detailed written report with photos within 24 hours. My realtor was impressed with how thorough and fast they were. Highly recommend for any home sale."</p>
        <div class="dss-review-meta">Peachtree City, GA &bull; Real Estate Inspection</div>
      </div>

      <div class="dss-review-card">
        <div class="dss-review-top">
          <div class="dss-review-avatar" style="background:#7c3aed;">TW</div>
          <div>
            <div class="dss-review-name">Tony W.</div>
            <div class="dss-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
          <div class="dss-review-glogo" title="Google Review">
            <svg width="14" height="14" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <p class="dss-review-text">"We manage several restaurants in the Atlanta area and Davis Southern handles all our grease trap service. Always on time, compliance docs ready same day, and the crew is always respectful of our kitchen staff. Best vendor relationship we have."</p>
        <div class="dss-review-meta">Atlanta, GA &bull; Grease Trap Cleaning</div>
      </div>

      <div class="dss-review-card">
        <div class="dss-review-top">
          <div class="dss-review-avatar" style="background:#ea580c;">LP</div>
          <div>
            <div class="dss-review-name">Linda P.</div>
            <div class="dss-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
          <div class="dss-review-glogo" title="Google Review">
            <svg width="14" height="14" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <p class="dss-review-text">"I've used three different septic companies over the years. Davis Southern is hands-down the best. They explained exactly what they found, showed me photos, and didn't try to upsell me on anything I didn't need. Pricing was exactly what they quoted."</p>
        <div class="dss-review-meta">Stockbridge, GA &bull; Septic Inspection</div>
      </div>

      <div class="dss-review-card">
        <div class="dss-review-top">
          <div class="dss-review-avatar" style="background:#0891b2;">MK</div>
          <div>
            <div class="dss-review-name">Mike K.</div>
            <div class="dss-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
          <div class="dss-review-glogo" title="Google Review">
            <svg width="14" height="14" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <p class="dss-review-text">"New construction install in Canton — they handled the entire permit process with Cherokee County, came in on schedule, and passed inspection first time. Zero stress on our end. Will absolutely use them on our next build."</p>
        <div class="dss-review-meta">Canton, GA &bull; Septic Installation</div>
      </div>

      <div class="dss-review-card">
        <div class="dss-review-top">
          <div class="dss-review-avatar" style="background:#be185d;">AC</div>
          <div>
            <div class="dss-review-name">Angela C.</div>
            <div class="dss-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
          <div class="dss-review-glogo" title="Google Review">
            <svg width="14" height="14" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <p class="dss-review-text">"Discovered a sewage smell in the yard on a Sunday. Called Davis Southern and they picked up immediately. Tech arrived within two hours, found a cracked baffle, explained the fix clearly, and had it resolved same day. Lifesavers."</p>
        <div class="dss-review-meta">Douglasville, GA &bull; Emergency Service</div>
      </div>

    </div><!-- /.dss-reviews-grid -->

    <div class="text-center" style="margin-top:36px;">
      <a href="https://www.google.com/maps/place/Davis+Southern+Septic/@33.7881144,-85.0124387,9z/data=!3m1!4b1!4m6!3m5!1s0xac1735369927ab83:0xb4a1dcf4027c67a1!8m2!3d33.7887265!4d-84.35304!16s%2Fg%2F11z8syhx7y" target="_blank" rel="noopener" class="btn btn-outline-brand">
        <svg width="16" height="16" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
        Read All Reviews on Google
      </a>
    </div>

  </div>
</section>

<!-- WHY US -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="why-grid">
      <div class="">
        <span class="tag">Why Choose Us</span>
        <h2 class="section-title">Your Neighbor, <span>Your Septic Pro</span></h2>
        <p style="margin:14px 0 0;">We&rsquo;re not a franchise or a call center, we are a local family crew that takes personal pride in every job. Experienced technicians, straight pricing, and a clean yard when we leave.</p>
        <div class="why-stats">
          <div class="stat-box"><span class="n">9+</span><span class="l">Counties Served</span></div>
          <div class="stat-box"><span class="n">24/7</span><span class="l">Emergency Service</span></div>
          <div class="stat-box"><span class="n">100%</span><span class="l">Licensed &amp; Insured</span></div>
          <div class="stat-box"><span class="n">&#10003;</span><span class="l">State Certified</span></div>
        </div>
        <a href="tel:4708394441" class="btn btn-primary">&#128222; Speak With Our Team</a>
      </div>
      <div class="why-panel">
        <div class="why-quads">
          <div class="why-quad"><div class="why-q-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div class="why-q-label">Licensed &amp;<br/>Insured</div></div>
          <div class="why-quad"><div class="why-q-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div><div class="why-q-label">Modern<br/>Equipment</div></div>
          <div class="why-quad"><div class="why-q-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><div class="why-q-label">Fair Flat-Rate<br/>Pricing</div></div>
          <div class="why-quad"><div class="why-q-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div><div class="why-q-label">Family-Owned<br/>Business</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICE AREAS -->
<section class="dss-section dss-section--light">
  <div class="dss-wrap">
    <div class="areas-grid">
      <div class="">
        <span class="tag">Where We Work</span>
        <h2 class="section-title">Serving Metro Atlanta <span>&amp; Beyond</span></h2>
        <p style="margin:12px 0 0;">We&rsquo;re a familiar face across nine Georgia counties and more. Expect the same prompt, professional service wherever you are in our coverage area.</p>
        <div class="county-tags" style="margin-top:24px;">
          <?php
          /* Map county display names to their data keys */
          $county_link_map = [
              'Fayette County'  => 'fayette',
              'Henry County'    => 'henry',
              'Clayton County'  => 'clayton',
              'Coweta County'   => 'coweta',
              'Fulton County'   => 'fulton',
              'Douglas County'  => 'douglas',
              'Gwinnett County' => 'gwinnett',
              'Forsyth County'  => 'forsyth',
              'Cherokee County' => 'cherokee',
          ];
          foreach($county_link_map as $county_name => $county_key): ?>
          <a href="<?php echo esc_url(home_url('/county/' . $county_key)); ?>" class="county-tag">
            <?php echo esc_html($county_name); ?>
          </a>
          <?php endforeach; ?>
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="county-tag county-tag--more">More &#8594;</a>
        </div>
        <div style="margin-top:32px;">
          <a href="tel:4708394441" class="btn btn-primary">&#128222; Call Now</a>
        </div>
      </div>
      <div class="map-box">
        <iframe title="Davis Southern Septic Service Area" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d207563.12!2d-84.4!3d33.55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1700000000000" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-badge">&#128205; 9+ Counties Served</div>
      </div>
    </div>
  </div>
</section>

<!-- STICKY MOBILE CTA BAR (hidden on desktop via CSS) -->
<div class="dss-mobile-sticky" aria-label="Quick actions">
  <a href="tel:4708394441" class="msb-call">
    &#128222; Call Now
  </a>
  <a href="#dss-quote-form" class="msb-quote">
    &#9998; Get a Quote
  </a>
</div>

<?php get_footer(); ?>
