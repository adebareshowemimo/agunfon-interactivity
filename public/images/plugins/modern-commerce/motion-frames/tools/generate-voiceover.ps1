<#
  generate-voiceover.ps1 — Modern Commerce ad voiceover via ElevenLabs TTS.

  The API key is read from the ELEVENLABS_API_KEY environment variable (never hardcode it):
      $env:ELEVENLABS_API_KEY = "sk_..."          # set once per shell
      ./generate-voiceover.ps1                     # uses defaults below

  Options:
      ./generate-voiceover.ps1 -Voice "Brian" -TextFile .\voiceover.txt -Out .\voiceover.mp3 -Speed 1.05
#>
param(
  [string]$ApiKey  = $env:ELEVENLABS_API_KEY,
  [string]$Voice   = "Brian",
  [string]$TextFile,
  [string]$Out     = (Join-Path $PSScriptRoot "..\voiceover.mp3"),
  [string]$Model   = "eleven_multilingual_v2",
  [double]$Stability = 0.42,
  [double]$Similarity = 0.80,
  [double]$Style     = 0.18,
  [double]$Speed     = 1.0            # 1.0 = normal; 1.05 shaves a couple of seconds
)

if (-not $ApiKey) { throw "Set `$env:ELEVENLABS_API_KEY first (get one in ElevenLabs > Settings > API Keys)." }

# --- voiceover text (default = the Modern Commerce ad; override with -TextFile) ---
$default = @'
You built your courses in Moodle.

But to sell them, every alternative drags you off it — WordPress and WooCommerce, LearnDash, Edwiser Bridge to sync… or a monthly move to LearnWorlds.

Two platforms. Monthly fees. Endless syncing. There's a smarter way.

Modern Commerce turns the Moodle you already run into a complete storefront. A branded catalogue. Cart and checkout. Paid through Stripe, Paystack, PayPal, or Flutterwave.

Sell courses, bundles, or recurring subscriptions. Coupons, enrolment keys, invoices, refunds. Recover lost sales automatically — and track every order on a live dashboard.

No bridge. No second website. No monthly SaaS. And every sale stays yours — we never take a cut.

One plugin. One-time. Three hundred dollars per site — with a full year of support, free.

Modern Commerce — sell from the Moodle you already own.
'@
$text = if ($TextFile -and (Test-Path $TextFile)) { Get-Content $TextFile -Raw } else { $default }

$headers = @{ "xi-api-key" = $ApiKey }

# --- resolve the voice id by name (fallback to the premade Brian id) ---
$voiceId = "nPczCjzI2devNBz1zQrb"
try {
  $voices = Invoke-RestMethod -Uri "https://api.elevenlabs.io/v1/voices" -Headers $headers -Method Get -ErrorAction Stop
  $v = $voices.voices | Where-Object { $_.name -eq $Voice } | Select-Object -First 1
  if ($v) { $voiceId = $v.voice_id }
} catch { Write-Warning "Voice lookup failed ($($_.Exception.Message)); using default Brian id." }
Write-Host "Voice: $Voice ($voiceId)  Model: $Model  Speed: $Speed"

# --- build body + POST (send as UTF-8 bytes so em-dashes/ellipses survive) ---
$body = @{
  text = $text
  model_id = $Model
  voice_settings = @{ stability = $Stability; similarity_boost = $Similarity; style = $Style; use_speaker_boost = $true; speed = $Speed }
} | ConvertTo-Json -Depth 6
$bytes = [System.Text.Encoding]::UTF8.GetBytes($body)
$uri = "https://api.elevenlabs.io/v1/text-to-speech/$voiceId" + "?output_format=mp3_44100_128"
try {
  Invoke-WebRequest -Uri $uri -Method Post -Headers (@{ "xi-api-key" = $ApiKey; "Accept" = "audio/mpeg" }) `
    -ContentType "application/json" -Body $bytes -OutFile $Out -ErrorAction Stop
} catch {
  Write-Error "TTS failed: $($_.Exception.Message)"
  if ($_.ErrorDetails.Message) { Write-Host $_.ErrorDetails.Message }
  return
}
Write-Host ("Saved {0:N0} bytes -> {1}" -f (Get-Item $Out).Length, (Resolve-Path $Out))
