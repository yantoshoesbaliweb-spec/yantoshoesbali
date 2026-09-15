  <!-- WhatsApp Custom Boot Order Modal -->
  <div class="wa-order-overlay" id="waOrderOverlay" style="display:none;">
    <div class="wa-order-modal" id="waOrderModal">
      <button type="button" class="wa-modal-close" id="waModalClose" aria-label="Close">&times;</button>

      <h3 class="wa-modal-title">Custom Boot Order</h3>
      <p class="wa-modal-subtitle">Fill in the details below and send your order via WhatsApp.</p>

      <form id="waOrderForm" class="wa-modal-form" novalidate>
        <input type="hidden" id="waProductName" value="" />

        <!-- Section: Client Details -->
        <div class="wa-section-label">Client Details</div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waCustomerName">Client Name <span class="wa-req">*</span></label>
            <input type="text" id="waCustomerName" placeholder="Your full name" required autocomplete="name" />
          </div>
          <div class="wa-field">
            <label>Gender <span class="wa-req">*</span></label>
            <div class="wa-pills">
              <label class="wa-pill"><input type="radio" name="waGender" value="Men" checked /><span>Men</span></label>
              <label class="wa-pill"><input type="radio" name="waGender" value="Woman" /><span>Woman</span></label>
            </div>
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waCustomerCountry">Country / Region <span class="wa-req">*</span></label>
            <input type="text" id="waCustomerCountry" placeholder="e.g. Australia, USA, Indonesia" required autocomplete="country-name" />
          </div>
          <div class="wa-field">
            <label for="waCustomerPhone">Phone / WhatsApp <span class="wa-req">*</span></label>
            <input type="tel" id="waCustomerPhone" placeholder="+61 4xx xxx xxx" required autocomplete="tel" />
          </div>
        </div>

        <div class="wa-field">
          <label for="waCustomerAddress">Delivery Address / Bali Hotel</label>
          <input type="text" id="waCustomerAddress" placeholder="Street address, city, postal code / Hotel name" />
        </div>

        <!-- Section: Boot Specs -->
        <div class="wa-section-label">Boot Specifications</div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waBootModel">Boot Model</label>
            <input type="text" id="waBootModel" />
          </div>
          <div class="wa-field">
            <label for="waHighBoot">High Boot / Shaft Height</label>
            <input type="text" id="waHighBoot" />
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waSkinTypes">Skin Type</label>
            <input type="text" id="waSkinTypes" />
          </div>
          <div class="wa-field">
            <label for="waColorTypes">Color Type</label>
            <input type="text" id="waColorTypes" />
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waToeCap">Toe Cap</label>
            <input type="text" id="waToeCap"/>
          </div>
          <div class="wa-field">
            <label for="waStitches">Stitches</label>
            <input type="text" id="waStitches" />
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waAccessoriesColor">Accessories Color</label>
            <input type="text" id="waAccessoriesColor" />
          </div>
          <div class="wa-field">
            <label>Zipper</label>
            <div class="wa-pills">
              <label class="wa-pill"><input type="radio" name="waZipper" value="No" checked /><span>No </span></label>
              <label class="wa-pill"><input type="radio" name="waZipper" value="Yes" /><span>Yes</span></label>
            </div>
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waHeightHeels">Height Heels</label>
            <input type="text" id="waHeightHeels" />
          </div>
          <div class="wa-field">
            <label for="waColorSole">Color Sole</label>
            <input type="text" id="waColorSole" />
          </div>
        </div>

        <!-- Section: Size & Measurements -->
        <div class="wa-section-label">Size &amp; Measurements</div>

        <div class="wa-field">
          <label for="waFootSize">Foot Size <span class="wa-req">*</span></label>
          <input type="text" id="waFootSize" required />
        </div>

        <!-- Measurement Guide Images -->
        <div class="wa-guide-row">
          <div class="wa-guide-thumb" onclick="openLightbox('{{ asset('images/foot_size_guide.png') }}', 'Foot Size Guide')" title="Click to enlarge">
            <img src="{{ asset('images/foot_size_guide.png') }}" alt="Foot Size Guide" loading="lazy" />
            <span>Foot Size Guide ðŸ”</span>
          </div>
          <div class="wa-guide-thumb" onclick="openLightbox('{{ asset('images/leg_measure_guide.png') }}', 'Leg Measurement Guide')" title="Click to enlarge">
            <img src="{{ asset('images/leg_measure_guide.png') }}" alt="Leg Measurement Guide" loading="lazy" />
            <span>Leg Measurement ðŸ”</span>
          </div>
        </div>

        <p class="wa-measure-note">8 leg measurement points (optional â€” you can also discuss on WhatsApp)</p>

        <div class="wa-measure-grid">
          <div class="wa-m-item">
            <label for="waLegFloorToKnee"><span class="wa-num">1</span> Floor to mid-knee</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegFloorToKnee" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegUnderKnee"><span class="wa-num">2</span> Under Knee</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegUnderKnee" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegFullCalf"><span class="wa-num">3</span> Full Calf</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegFullCalf" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegCalfHeight"><span class="wa-num">4</span> Calf Height</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegCalfHeight" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegAroundTen"><span class="wa-num">5</span> 10&quot; from ground</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegAroundTen" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegAroundAnkle"><span class="wa-num">6</span> Ankle</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegAroundAnkle" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegHeelAmount"><span class="wa-num">7</span> Heel Amount</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegHeelAmount" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegInstep"><span class="wa-num">8</span> Instep</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegInstep" placeholder="cm" /><span>CM</span></div>
          </div>
        </div>

        <div class="wa-field" style="margin-top:10px;">
          <label for="waNotes">Additional Notes (Optional)</label>
          <textarea id="waNotes" placeholder="e.g. Initials embroidered, Vibram sole, etc." rows="2"></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" class="wa-submit-btn" id="waSubmitBtn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Send Order via WhatsApp
        </button>
      </form>
    </div>
  </div>

  <!-- Image Lightbox -->
  <div class="wa-lightbox-overlay" id="waLightboxOverlay" style="display:none;" onclick="closeLightbox()">
    <div class="wa-lightbox-box" onclick="event.stopPropagation()">
      <button type="button" class="wa-lb-close" onclick="closeLightbox()" aria-label="Close">&times;</button>
      <img src="" alt="Guide" id="waLightboxImg" />
      <div class="wa-lb-caption" id="waLightboxCaption"></div>
    </div>
  </div>

  <style>
    /* ===== Simple WhatsApp Order Modal ===== */
    .wa-order-overlay {
      position: fixed; inset: 0; z-index: 9999;
      background: rgba(0,0,0,0.7);
      backdrop-filter: blur(6px);
      display: flex; align-items: center; justify-content: center;
      padding: 16px;
      animation: waFadeIn .2s ease;
    }
    @keyframes waFadeIn { from{opacity:0} to{opacity:1} }

    .wa-order-modal {
      background: #1a1209;
      border: 1px solid rgba(219,162,76,0.25);
      border-radius: 14px;
      padding: 28px 24px 24px;
      max-width: 580px; width: 100%;
      max-height: 90vh; overflow-y: auto;
      position: relative;
      box-shadow: 0 20px 50px rgba(0,0,0,0.6);
      animation: waSlideUp .25s ease;
      scrollbar-width: thin;
      scrollbar-color: #dba24c #1a1209;
    }
    @keyframes waSlideUp { from{transform:translateY(16px);opacity:0} to{transform:translateY(0);opacity:1} }

    .wa-order-modal::-webkit-scrollbar { width: 6px; }
    .wa-order-modal::-webkit-scrollbar-track { background: #1a1209; }
    .wa-order-modal::-webkit-scrollbar-thumb { background: #dba24c; border-radius: 3px; }

    .wa-modal-close {
      position: absolute; top: 12px; right: 14px;
      background: none; border: none;
      color: #a89478; font-size: 1.5rem;
      cursor: pointer; line-height: 1;
      transition: color .2s;
    }
    .wa-modal-close:hover { color: #fff; }

    .wa-modal-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.3rem; font-weight: 700;
      color: #f5ead6; margin: 0 0 4px;
    }
    .wa-modal-subtitle {
      font-size: 0.82rem; color: #a89478;
      margin: 0 0 20px; line-height: 1.4;
    }

    /* Section Labels */
    .wa-section-label {
      font-size: 0.72rem; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: #dba24c; margin: 20px 0 12px;
      padding-bottom: 6px;
      border-bottom: 1px solid rgba(219,162,76,0.18);
    }
    .wa-section-label:first-of-type { margin-top: 0; }

    /* Form Layout */
    .wa-modal-form { display: flex; flex-direction: column; }

    .wa-row {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 12px; margin-bottom: 10px;
    }
    .wa-field { display: flex; flex-direction: column; gap: 5px; margin-bottom: 10px; }

    .wa-field label {
      font-size: 0.78rem; font-weight: 600;
      color: #c4ab82; text-transform: uppercase;
      letter-spacing: 0.02em;
    }
    .wa-req { color: #e57373; }

    .wa-field input,
    .wa-field textarea {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(219,162,76,0.2);
      border-radius: 8px;
      padding: 10px 12px;
      color: #f5ead6; font-size: 0.88rem;
      font-family: inherit; outline: none;
      transition: border-color .2s;
    }
    .wa-field input:focus,
    .wa-field textarea:focus {
      border-color: #dba24c;
    }
    .wa-field input::placeholder,
    .wa-field textarea::placeholder {
      color: rgba(196,171,130,0.35);
    }
    .wa-field textarea { resize: vertical; }

    /* Radio Pills */
    .wa-pills { display: flex; gap: 6px; }
    .wa-pill {
      flex: 1; position: relative;
      cursor: pointer; margin: 0 !important;
    }
    .wa-pill input { position: absolute; opacity: 0; width: 0; height: 0; }
    .wa-pill span {
      display: block; text-align: center;
      padding: 9px 10px;
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(219,162,76,0.2);
      border-radius: 8px;
      color: #c4ab82; font-weight: 600;
      font-size: 0.84rem; transition: all .2s;
      user-select: none;
    }
    .wa-pill:hover span { border-color: #dba24c; }
    .wa-pill input:checked + span {
      background: #dba24c; border-color: #dba24c;
      color: #170f07; font-weight: 700;
    }

    /* Guide Thumbnails */
    .wa-guide-row {
      display: flex; gap: 12px;
      margin: 10px 0 14px;
    }
    .wa-guide-thumb {
      flex: 1; background: #fff;
      border-radius: 8px; padding: 6px;
      cursor: pointer;
      display: flex; flex-direction: column;
      align-items: center; gap: 4px;
      transition: transform .2s, box-shadow .2s;
    }
    .wa-guide-thumb:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 14px rgba(219,162,76,0.25);
    }
    .wa-guide-thumb img {
      width: 100%; height: 80px;
      object-fit: contain; display: block;
    }
    .wa-guide-thumb span {
      font-size: 0.65rem; font-weight: 700;
      color: #170f07; background: #dba24c;
      padding: 2px 6px; border-radius: 4px;
      text-transform: uppercase;
    }

    /* Measurement Note */
    .wa-measure-note {
      font-size: 0.75rem; color: #a89478;
      margin: 0 0 10px; line-height: 1.3;
    }

    /* Measurement Grid */
    .wa-measure-grid {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 8px;
    }
    .wa-m-item { display: flex; flex-direction: column; gap: 3px; }
    .wa-m-item label {
      font-size: 0.72rem; font-weight: 600;
      color: #c4ab82; display: flex;
      align-items: center; gap: 5px;
    }
    .wa-num {
      display: inline-flex; align-items: center;
      justify-content: center;
      width: 16px; height: 16px;
      background: rgba(219,162,76,0.2);
      color: #dba24c; border-radius: 50%;
      font-size: 0.65rem; font-weight: 700;
      flex-shrink: 0;
    }
    .wa-cm-input {
      position: relative; display: flex; align-items: center;
    }
    .wa-cm-input input {
      width: 100%;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(219,162,76,0.18);
      border-radius: 7px;
      padding: 7px 28px 7px 10px;
      color: #f5ead6; font-size: 0.82rem;
      outline: none; transition: border-color .2s;
    }
    .wa-cm-input input:focus { border-color: #dba24c; }
    .wa-cm-input span {
      position: absolute; right: 8px;
      font-size: 0.65rem; font-weight: 700;
      color: #dba24c; pointer-events: none;
    }

    /* Submit Button */
    .wa-submit-btn {
      display: flex; align-items: center;
      justify-content: center; gap: 8px;
      width: 100%; margin-top: 20px;
      padding: 13px 20px; border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, #25D366, #128C7E);
      color: #fff; font-size: 0.95rem;
      font-weight: 700; cursor: pointer;
      transition: transform .15s, box-shadow .2s;
      font-family: inherit;
    }
    .wa-submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37,211,102,0.35);
    }

    /* Lightbox */
    .wa-lightbox-overlay {
      position: fixed; inset: 0; z-index: 100000;
      background: rgba(0,0,0,0.88);
      display: flex; align-items: center; justify-content: center;
      padding: 20px; animation: waFadeIn .2s ease;
    }
    .wa-lightbox-box {
      position: relative; background: #1a1209;
      border: 1px solid rgba(219,162,76,0.3);
      border-radius: 12px; padding: 14px;
      max-width: 90vw; max-height: 90vh;
      display: flex; flex-direction: column;
      align-items: center;
    }
    .wa-lightbox-box img {
      max-width: 100%; max-height: 75vh;
      object-fit: contain; background: #fff;
      border-radius: 8px; padding: 8px;
    }
    .wa-lb-caption {
      margin-top: 8px; font-size: 0.85rem;
      color: #dba24c; font-weight: 600;
    }
    .wa-lb-close {
      position: absolute; top: -12px; right: -12px;
      background: #c93b2b; color: #fff;
      border: 2px solid #fff; border-radius: 50%;
      width: 30px; height: 30px; font-size: 1.3rem;
      cursor: pointer; display: flex;
      align-items: center; justify-content: center;
      line-height: 1; transition: transform .2s;
    }
    .wa-lb-close:hover { transform: scale(1.15); }

    /* Responsive */
    @media (max-width: 600px) {
      .wa-order-modal { padding: 20px 16px; max-height: 94vh; }
      .wa-modal-title { font-size: 1.15rem; }
      .wa-row { grid-template-columns: 1fr; gap: 0; }
      .wa-measure-grid { grid-template-columns: 1fr; }
      .wa-guide-row { flex-direction: column; }
    }
  </style>

  <script>
    (function() {
      const waNumber = '{{ $contact["whatsapp"] ?? "6281353055475" }}';
      const overlay = document.getElementById('waOrderOverlay');
      const modal = document.getElementById('waOrderModal');
      const closeBtn = document.getElementById('waModalClose');
      const form = document.getElementById('waOrderForm');
      const productNameInput = document.getElementById('waProductName');
      const bootModelInput = document.getElementById('waBootModel');

      // Lightbox
      const lbOverlay = document.getElementById('waLightboxOverlay');
      const lbImg = document.getElementById('waLightboxImg');
      const lbCaption = document.getElementById('waLightboxCaption');

      window.openLightbox = function(src, caption) {
        lbImg.src = src;
        lbCaption.textContent = caption || '';
        lbOverlay.style.display = 'flex';
      };
      window.closeLightbox = function() {
        lbOverlay.style.display = 'none';
        lbImg.src = '';
      };

      // Open modal
      window.openWaOrderModal = function(productName) {
        productNameInput.value = productName || 'Custom Cowboy Boots';
        if (bootModelInput) bootModelInput.value = productName || 'Classic Cowboy Boots';
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(function() { document.getElementById('waCustomerName').focus(); }, 200);
      };

      // Close modal
      function closeModal() {
        overlay.style.display = 'none';
        document.body.style.overflow = '';
      }

      closeBtn.addEventListener('click', closeModal);
      overlay.addEventListener('click', function(e) { if (e.target === overlay) closeModal(); });
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          if (lbOverlay.style.display === 'flex') closeLightbox();
          else if (overlay.style.display === 'flex') closeModal();
        }
      });

      // Build WhatsApp message
      function buildMessage() {
        const v = id => (document.getElementById(id)?.value?.trim() || '');
        const name = v('waCustomerName') || '-';
        const gender = document.querySelector('input[name="waGender"]:checked')?.value || 'Men';
        const country = v('waCustomerCountry') || '-';
        const phone = v('waCustomerPhone') || '-';
        const address = v('waCustomerAddress');
        const model = v('waBootModel') || productNameInput.value || 'Custom Boots';

        let msg = `Hello Yanto Shoes Bali,\nI would like to place a Custom Boot Order:\n\n`;
        msg += `*CLIENT DETAILS:*\n`;
        msg += `â€¢ Name: ${name}\nâ€¢ Gender: ${gender}\nâ€¢ Country: ${country}\nâ€¢ Phone/WA: ${phone}\n`;
        if (address) msg += `â€¢ Address: ${address}\n`;

        msg += `\n *BOOT SPECIFICATIONS:*\n`;
        msg += `â€¢ Model: ${model}\n`;

        const specs = [
          ['waHighBoot', 'High Boot / Shaft Height'],
          ['waSkinTypes', 'Skin Type'],
          ['waColorTypes', 'Color Type'],
          ['waToeCap', 'Toe Cap'],
          ['waStitches', 'Stitches'],
          ['waAccessoriesColor', 'Accessories Color'],
        ];
        specs.forEach(([id, label]) => { const val = v(id); if (val) msg += `â€¢ ${label}: ${val}\n`; });

        const zipper = document.querySelector('input[name="waZipper"]:checked')?.value || 'No';
        msg += `â€¢ Zipper: ${zipper}\n`;

        const heels = v('waHeightHeels'); if (heels) msg += `â€¢ Height Heels: ${heels}\n`;
        const sole = v('waColorSole'); if (sole) msg += `â€¢ Color Sole: ${sole}\n`;

        const footSize = v('waFootSize');
        if (footSize) msg += `\n *FOOT SIZE:* ${footSize}\n`;

        const mIds = [
          ['waLegFloorToKnee', 'Floor to mid-knee'],
          ['waLegUnderKnee', 'Under Knee'],
          ['waLegFullCalf', 'Full Calf'],
          ['waLegCalfHeight', 'Calf Height'],
          ['waLegAroundTen', '10" from ground'],
          ['waLegAroundAnkle', 'Ankle'],
          ['waLegHeelAmount', 'Heel Amount'],
          ['waLegInstep', 'Instep'],
        ];
        const mVals = mIds.map(([id, label], i) => {
          const val = v(id); return val ? `${i+1}. ${label}: ${val} cm` : null;
        }).filter(Boolean);

        if (mVals.length) {
          msg += `\nðŸ“ *LEG MEASUREMENTS:*\n`;
          mVals.forEach(line => msg += `${line}\n`);
        }

        const notes = v('waNotes');
        if (notes) msg += `\n *Notes:* ${notes}\n`;

        return msg;
      }

      // Submit
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('waCustomerName').value.trim();
        const country = document.getElementById('waCustomerCountry').value.trim();
        const phone = document.getElementById('waCustomerPhone').value.trim();
        const footSize = document.getElementById('waFootSize').value.trim();

        if (!name) { alert('Please enter your name.'); document.getElementById('waCustomerName').focus(); return; }
        if (!country) { alert('Please enter your country.'); document.getElementById('waCustomerCountry').focus(); return; }
        if (!phone) { alert('Please enter your phone number.'); document.getElementById('waCustomerPhone').focus(); return; }
        if (!footSize) { alert('Please enter your foot size.'); document.getElementById('waFootSize').focus(); return; }

        const msg = buildMessage();
        window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(msg)}`, '_blank');
        closeModal();
      });

      // Attach click handlers to catalog cards
      document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.catalog-card').forEach(function(card) {
          const productName = card.getAttribute('data-name') || card.querySelector('.catalog-boot-name')?.textContent?.trim() || 'Product';
          card.style.cursor = 'pointer';
          card.addEventListener('click', function(e) {
            if (e.target.closest('a')) e.preventDefault();
            openWaOrderModal(productName);
          });

          const orderBtn = card.querySelector('.btn-card-order');
          if (orderBtn) {
            orderBtn.removeAttribute('href');
            orderBtn.removeAttribute('target');
            orderBtn.style.cursor = 'pointer';
            orderBtn.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); openWaOrderModal(productName); });
          }

          const inquireLink = card.querySelector('.catalog-inquire-link');
          if (inquireLink) {
            inquireLink.removeAttribute('href');
            inquireLink.removeAttribute('target');
            inquireLink.style.cursor = 'pointer';
            inquireLink.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); openWaOrderModal(productName); });
          }
        });
      });
    })();
  </script>
