"""
Run this once in your project folder:
    python make_favicon.py

It will create favicon.ico next to this script.
Then you can delete make_favicon.py.
"""
import struct, os

def create_ico():
    width, height = 16, 16
    pixels = []

    for y in range(height):
        row = []
        for x in range(width):
            cx, cy = x - 7.5, y - 7.5
            dist = (cx*cx + cy*cy) ** 0.5
            if dist <= 7.5:
                r, g, b, a = 10, 124, 62, 255
                if dist > 6:
                    r, g, b = 7, 92, 46
                row.append((r, g, b, a))
            else:
                row.append((0, 0, 0, 0))
        pixels.append(row)

    # White checkmark
    check = [(4,9),(5,10),(6,11),(7,10),(8,9),(9,8),(10,7),(11,6)]
    for (cx2, cy2) in check:
        if 0 <= cy2 < 16 and 0 <= cx2 < 16:
            pixels[cy2][cx2] = (255, 255, 255, 255)

    # BMP header
    bmp_data = bytearray()
    bmp_data += struct.pack('<I', 40)
    bmp_data += struct.pack('<i', width)
    bmp_data += struct.pack('<i', height * 2)
    bmp_data += struct.pack('<H', 1)
    bmp_data += struct.pack('<H', 32)
    bmp_data += struct.pack('<I', 0)
    bmp_data += struct.pack('<I', 0)
    bmp_data += struct.pack('<i', 0)
    bmp_data += struct.pack('<i', 0)
    bmp_data += struct.pack('<I', 0)
    bmp_data += struct.pack('<I', 0)

    # Pixel data (bottom-up, BGRA)
    for row in reversed(pixels):
        for (r, g, b, a) in row:
            bmp_data += bytes([b, g, r, a])

    # AND mask
    for row in reversed(pixels):
        mask_bits = 0
        for i, (r, g, b, a) in enumerate(row):
            if a == 0:
                mask_bits |= (1 << (15 - i))
        bmp_data += struct.pack('>H', mask_bits) + b'\x00\x00'

    # ICO container
    ico_data = bytearray()
    ico_data += struct.pack('<H', 0)
    ico_data += struct.pack('<H', 1)
    ico_data += struct.pack('<H', 1)

    image_offset = 6 + 16
    ico_data += struct.pack('<B', 16)
    ico_data += struct.pack('<B', 16)
    ico_data += struct.pack('<B', 0)
    ico_data += struct.pack('<B', 0)
    ico_data += struct.pack('<H', 1)
    ico_data += struct.pack('<H', 32)
    ico_data += struct.pack('<I', len(bmp_data))
    ico_data += struct.pack('<I', image_offset)
    ico_data += bmp_data

    return bytes(ico_data)

out_path = os.path.join(os.path.dirname(os.path.abspath(__file__)), 'favicon.ico')
ico = create_ico()
with open(out_path, 'wb') as f:
    f.write(ico)
print(f'Done! favicon.ico created ({len(ico)} bytes) at: {out_path}')
